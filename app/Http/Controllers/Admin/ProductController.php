<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Picqer;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.products.index', [
            'title'=>'Product List',
            'products'=>$this->productService->get(),
        ]);
    }
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        $brands = Brand::orderBy('id')->get();

        $product_code = rand();
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($product_code,$generator::TYPE_CODE_128);
        return view('admin.products.create',[
            'title'=>'Add new Product',
            'categories'=>$categories,
            'product_code'=>$product_code,
            'barcode'=>$barcode,
            'users' => Auth::user(),
            'brands'=>$brands,
        ]);
    }

    public function store(Request $request)
    {
        $this->productService->store($request);
        return redirect()->back();
    }

    public function edit($id)
    {
        $brands = Brand::orderBy('id')->get();
        $categories = Category::orderBy('id')->get();
        $product = $this->productService->getById($id);
        $users = User::orderBy('id')->get();
        return view('admin.products.edit',[
            'title'=>'Edit Product: ' . $product->name,
            'categories'=>$categories,
            'product'=>$product,
            'brands'=>$brands,
            'users' => Auth::user(),
        ]);
    }


   public function update(ProductRequest $request, $id)
   {
       $product = Product::find($id);
       $this->productService->update($request,$product);
       return redirect(route('admin.products.index'));
   }


    public function destroy(Request $request){
        $result = $this->productService->destroy($request);
        if ($result){
            return redirect(route('admin.products.index'))
                ->with('success', __('Xóa thành công!'));
        }
        return redirect(route('admin.products.index'))
            ->with('error', __('xóa không thành công!'));
    }

    public function getBarcode($id){
        $product = Product::find($id);
        return view('admin.products.barcode',[
            'product'=>$product,
        ]);
    }


    public function quotation()
    {
        return view('admin.products.quotation', [
            'title'=>'Giá sản phẩm',
            'products'=>$this->productService->get(),
        ]);
    }
}
