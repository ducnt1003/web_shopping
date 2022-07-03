<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sale;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Store;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {
        $user = Auth::user();
        $store = Store::where('id',$user->store_id)->first();
        //$stocks = DB::table('warehouses')->where('store_id','=',$store->id)->get();
        $stocks = DB::table('warehouses')
        ->join('products', 'products.id', '=', 'warehouses.product_id')
        ->where('store_id',$store->id)
        ->get();
              
        return view('admin.orders.pos',[           
            'stocks'=>$stocks,
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function cancel(){
        session()->forget('cart');
        return redirect()->back();      
    } 

    public function charge(){
        return view('admin.orders.order');
    }
    public function save(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);
        $customer = Customer::where('phone',$request->phone)->first();
        
        if(!$customer){    
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = "sample@email.com";
            $customer->save();
        }
        
        $carts = session()->get('cart');
        $user = Auth::user();
        $order = new Order(); 
        $order->customer_id = $customer->id; 
        $order->save();  
        $total = 0; 
        foreach($carts as $cart){
            $warehouse = Warehouse::where('product_id',$cart['product_id'])
            ->where('store_id',$user->store_id)->first();
            $warehouse->quantity = $warehouse->quantity - $cart['quantity'];
            $warehouse->save();
            $orderDetail = new OrderDetail();
            $orderDetail->warehouse_id = $warehouse->id;
            $orderDetail->quantity =  $cart['quantity'];
            $orderDetail->order_id = $order->id;
            $orderDetail->save();
            $ca = new Cart();
            $ca->product_id = $cart['product_id'];
            $ca->quantity = $cart['quantity'];
            $ca->customer_id = $customer->id;
            $ca->price = $cart['price'];
            $ca->save();
            $total += $cart['quantity']*$cart['price'];
            $time = getdate();
            $sale = Sale::where('year',$time['year'])
            ->where('month',$time['mon'])
            ->where('product_id',$cart['product_id'])->first();
            if (!$sale){
                $sale = new Sale();
                $sale->month = $time['mon'];
                $sale->year = $time['year'];
                $sale->product_id = $cart['product_id'];
                $sale->sold_quantity = 0;
            }
            $sale->sold_quantity += $cart['quantity'];
            $sale->money += $total;
            $sale->save();
        }
        $order->price = $total;
        $order->update();
        
        $this->cancel();
        return redirect(route('admin.orders.order'));
    }

    public function print(){       
        return view('admin.orders.order-print');      
    } 
}
