<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id){
        $product = DB::table('products')->find($id);
        $products_related = Product::where('category_id','=',$product->category_id)->where('id','!=',$id)->limit(4)->get();
//        $products_img = Image::where('product_id','=',$id)->get();
        $category = Category::find($product->category_id);
        return view('product',[
            'product'=>$product,
            'products_related'=>$products_related,
            'title'=>$product->name,
            'category'=>$category,
        ]);
    }
}
