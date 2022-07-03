<?php

use App\Http\Controllers\Admin\FeedController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RssController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/fbfeed.xml/{id}', [FeedController::class, 'fbFeed'])->name('fbfeed');
Route::get('/ggfeed.xml/{id}', [FeedController::class, 'ggFeed'])->name('ggFeed');

Route::get('google', [CustomerController::class, 'googleRedirect'])->name('auth.google');
Route::get('/auth/google-callback', [CustomerController::class, 'loginWithGoogle']);
//Route::get('facebook', [CustomerController::class, 'facebookRedirect'])->name('auth.facebook');
//Route::get('/auth/facebook/callback', [CustomerController::class, 'loginWithFacebook']);

Route::get('admin/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('admin/forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post');
Route::get('admin/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('admin/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop/{id?}',[ShopController::class,'index'])->name('shop');
Route::get('/product/{id}',[ProductController::class,'index'])->name('product');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'checkout'])->name('checkout-finish');
Route::get('/confirmation',[CheckoutController::class,'confirmation'])->name('confirmation');
Route::get('/cart',[CartController::class,'show'])->name('cart');
Route::post('add-cart',[CartController::class,'index'])->name('add-cart');
Route::post('update-cart',[CartController::class,'update'])->name('update-cart');
Route::get('delete-cart/{id}',[CartController::class,'delete'])->name('delete-cart');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/login',[CustomerController::class,'login'])->name('login');
Route::post('/login',[CustomerController::class,'authenticate'])->name('login.authenticate');
Route::get('logout',[CustomerController::class,'logout'])->name('logout');
Route::get('/register',[CustomerController::class,'register'])->name('register');
Route::post('/register',[CustomerController::class,'store'])->name('register.store');
Route::get('/forgetpassword',[CustomerController::class,'forgetpassword'])->name('forgetpassword');
Route::get('/rss',[RssController::class,'index'])->name('rss');
