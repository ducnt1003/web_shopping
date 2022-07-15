<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer_auth.login', [
            'title' => 'Login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->except('_token');
        $user = DB::table('customers')->where('email', $request->email)->first();
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không đúng. ',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
    public function register()
    {
        return view('customer_auth.register', [
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required'
        ]);
        if ($request->password != $request->input('confirm-password')) {
            return redirect(route('register'))->with('error', __('confirm-password is differrent'));
        }
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect(route('login'))
            ->with('success', __('Register\'s success!'));
    }
    public function forgetpassword()
    {
        return view('customer_auth.forgetpassword', [
            'title' => 'Forgetpassword'
        ]);
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.customerForgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('customer_auth.recover-password', ['token' => $token,'title' => 'Reset password']);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        };
        $user = Customer::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();

        return redirect('login')->with('message', 'Your password has been changed!');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {

            $googleUser = Socialite::driver('google')->user();
            $customer = Customer::where('google_id', $googleUser->id)->first();

            if ($customer) {
                Auth::login($customer);
                return redirect('/');
            } else {
                $createUser = Customer::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => encrypt('test@123')
                ]);

                Auth::login($createUser);
                return redirect('/');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $customer = Customer::where('google_id', $facebookUser->id)->first();
            if ($customer) {
                Auth::login($customer);
                return redirect(route('home'));
            } else {
                $createUser = Customer::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'password' => encrypt('test@123')
                ]);

                Auth::login($createUser);
                return redirect(route('home'));
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
