<?php

namespace App\Http\Controllers;

use App\Http\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected $checkoutService;
    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }
    public function index(){
        $products = $this->checkoutService->getProduct();
        return view('checkout',[
            'title'=>'Checkout',
            'products'=>$products,
            'carts'=>Session::get('carts')
        ]);
    }

    public function checkout(Request $request){
        $result = $this->checkoutService->checkout($request);
        if ($result){
            return redirect(route('confirmation'));
        }
        return redirect()->back();
    }

    public function confirmation(){
        return view('confirmation', [
            'title'=>'confirmation',
        ]);
    }
}
