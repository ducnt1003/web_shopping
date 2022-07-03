<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $categories12 = Category::select('name', 'id','photo', 'description')->whereIn('id', [1, 2])->get();
        $category3 = Category::find(3);
        $products = Product::orderByDesc('id')->limit(9)->get();
        return view('home',[
            'title'=>'Rhust',
            'categories12'=>$categories12,
            'category3'=>$category3,
            'products'=>$products,
        ]);
    }
}
