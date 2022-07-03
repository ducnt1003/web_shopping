<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class CustomerController extends Controller
{
    public function login(){
        return view('customer_auth.login',[
            'title'=>'Login'
        ]);
    }
    public function authenticate(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->except('_token');
        $user = DB::table('customers')->where('email',$request -> email) -> first();
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();                  
            return redirect()->intended(route('home'));          
        }
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không đúng. ',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
    public function register(){
        return view('customer_auth.register',[
            'title'=>'Register'
        ]);
    }
    public function store(Request $request){
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required'
        ]);
        if ($request->password != $request->input('confirm-password')){
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
    public function forgetpassword(){
        return view('customer_auth.forgetpassword',[
            'title'=>'Forgetpassword'
        ]);
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

            if($customer){
                Auth::login($customer);
                return redirect('/');
            }

            else{
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
            if($customer){
                Auth::login($customer);
                return redirect(route('home'));
            }

            else{
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
