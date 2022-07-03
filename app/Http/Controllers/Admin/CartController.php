<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index(){
        return view('admin.carts.list',[
            'title'=>'Danh sách đơn hàng',
            'carts'=>$this->cart->getCartList()
        ]);
    }

    public function detail($id){
        $customer = Customer::find($id);

        return view('admin.carts.detail',[
            'title'=>'Chi tiết đơn hàng: '.$customer->name,
            'customer' => $customer,
            'carts' => $customer->carts()->with('product')->get(),
        ]);
    }

    public function delete(Request $request){
        $result = $this->cart->destroy($request);
        if ($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}
