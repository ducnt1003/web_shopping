<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function show(){
        $products = $this->cartService->getProduct();
        return view('carts.list',[
            'title'=>'Your Cart',
            'products'=>$products,
            'carts'=>Session::get('carts')
        ]);
    }

    public function index(Request $request){
        $result = $this->cartService->create($request);
        if ($result === false){
            return redirect()->back();
        }
        return redirect(route('cart'));
    }

    public function update(Request $request){
        $this->cartService->update($request);
        return redirect(route('cart'));
    }

    public function delete($id){
        $this->cartService->delete($id);
        return redirect(route('cart'));
    }
}
