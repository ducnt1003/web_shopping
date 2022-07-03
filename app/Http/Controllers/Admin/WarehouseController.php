<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Warehouse;
use App\Models\Product;

class WarehouseController extends Controller
{
    public function index()
    {
        $stores = DB::table('stores')->get();
        return view('admin.warehouses.index',[
            'title'=>'Danh sách nhà kho',
            'stores'=>$stores,
        ]);
    }
    
    public function edit($id)
    {
        $stocks = DB::table('warehouses')
        ->join('products', 'products.id', '=', 'warehouses.product_id')
        ->where('store_id',$id)
        ->get();

        $name = DB::table('stores')->where('id',$id)->first();
        // dd($name->name);
        if ($stocks) {
            return view('admin.warehouses.edit', [
                'title' => $name->name,
                'stocks' => $stocks,
                'name' => $name
            ]);
        }
    }

    public function search(Request $request)
    {
        $query = $request -> input('query');    
        $products = DB::table('products')
        ->join('warehouses', 'warehouses.product_id', '=', 'products.id')
        ->where('name','like',"%$query%")
        ->get();

        // $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        //     foreach($products as $row)
        //     {
        //        $output .= '
        //        <li><a href="data/'. $row->id .'">'.$row->name.'</a></li>
        //        ';
        //     }
        // $output .= '</ul>';
        // echo $output;

        return view('admin.warehouses.search', [
            'title' => 'Kết quả tìm kiếm',
            'products' => $products
        ]);
    }
}
