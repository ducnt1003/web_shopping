<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request,$categoryId = null){
        $f = $request->input('f',false);
        $query = new Product();
        $cate_parent1 = Category::find(1);
        $cate_parent2 = Category::find(2);
        $cate_parent3 = Category::find(3);
        $cate_childs1 = Category::where('parent_id',$cate_parent1->id)->get();
        $cate_childs2 = Category::where('parent_id',$cate_parent2->id)->get();
        $cate_childs3 = Category::where('parent_id',$cate_parent3->id)->get();
        if ($categoryId){
            $query = $query->where('category_id',$categoryId);
            $category = Category::find($categoryId);
        }else{
            $category = Category::find(1);
            $category->name = 'Shop';
        }
        switch ($f){
            case 'id':
                $query = $query->orderBy('id','DESC');
                break;
            case 'name':
                $query = $query->orderBy('name','ASC');
                break;
            case 'asc':
                $query = $query->orderBy('price','ASC');
                break;
            case 'desc':
                $query = $query->orderBy('price','DESC');
                break;
            default:
                $query = $query->orderBy('id','DESC');
        }
        $products= $query->where('active',1)->paginate(9);;
        return view('shop',[
            'title'=>$category->name,
            'products'=>$products,
            'cate_parent1'=>$cate_parent1,
            'cate_parent2'=>$cate_parent2,
            'cate_parent3'=>$cate_parent3,
            'cate_childs1'=>$cate_childs1,
            'cate_childs2'=>$cate_childs2,
            'cate_childs3'=>$cate_childs3,
        ]);
    }
}
