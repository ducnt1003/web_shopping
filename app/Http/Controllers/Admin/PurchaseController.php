<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PurchaseRequest;
use App\Models\Admin\Purchase;
use App\Models\Admin\Purchases_payment;
use App\Models\Admin\Purchases_product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('id', 'DESC')->where('status', '=', 0)->simplePaginate();
        return view(
            'admin.purchases.index',
            [
                'title' => 'Danh sách đơn nhập hàng chưa hoàn thành'
            ],
            compact('purchases')
        );
    }

    public function complete_purchases()
    {
        $purchases = Purchase::orderBy('id', 'DESC')->where('status', '=', 1)->simplePaginate();
        return view(
            'admin.purchases.complete_purchases',
            [
                'title' => 'Danh sách đơn nhập hàng đã hoàn thành'
            ],
            compact('purchases')
        );
    }
    public function create()
    {
        return view(
            'admin.purchases.create',
            [
                'title' => 'Thêm đơn nhập hàng'
            ],
        );
    }

    public function detail($purchase_id)
    {
        $purchase = DB::table('purchases')->where('purchase_id', '=', $purchase_id)->first();
        $products = DB::table('purchases_products')
            ->where('purchase_id', '=', $purchase_id)
            ->orderBy('id', 'DESC')
            ->simplePaginate();
        //$title = $purchase->title;
        $title = 'Chi tiết đơn hàng ';
        return view(
            'admin.purchases.detail',
            ['title' => $title],
            compact('products', 'purchase_id')
        );
    }

    public function edit($purchase_id)
    {
        $purchase = DB::table('purchases')->where('purchase_id', '=', $purchase_id)->first();
        return view(
            'admin.purchases.edit',
            ['title' => 'Sửa thông tin đơn hàng'],
            compact('purchase')
        );
    }

    public function edit_product($purchase_id, $product_id)
    {
        $product = DB::table('purchases_products')
            ->where([
                ['purchase_id', '=', $purchase_id],
                ['product_id', '=', $product_id]
            ])->first();
        return view(
            'admin.purchases.edit_product',
            ['title' => 'Sửa thông tin sản phẩm trong đơn hàng'],
            compact('product')
        );
    }

    public function edit_payment($purchase_id)
    {
        $payment = DB::table('purchases_payments')->where('purchase_id', '=', $purchase_id)->first();
        $id = $payment->id;
        $payment = Purchases_payment::find($id);
        return view(
            'admin.purchases.edit_payment',
            ['title' => 'Sửa thông tin thanh toán'],
            compact('payment')
        );
    }

    public function store(PurchaseRequest $request)
    {
        $data =  $request->except('_token');
        $data = array_filter($data, 'strlen');
        $purchase = Purchase::create($data);
        if ($purchase) {
            return redirect(route('admin.purchases.index'))
                ->with('success', __('Create purchase\'s success!'));
        }
        return redirect(route('admin.purchases.index'))
            ->with('error', __('Create purchase\'s error!'));
    }

    public function update_purchase(PurchaseRequest $request, $id)
    {
        $purchase = Purchase::find($id);
        if ($purchase) {
            $purchase->purchase_id = $request->input('purchase_id');
            $purchase->title = $request->input('title');
            $purchase->money = $request->input('money');
            $purchase->place_order = $request->input('place_order');
            $purchase->stock_id = $request->input('stock_id');
            $purchase->save();
        }
        return redirect(route('admin.purchases.index'))
            ->with('success', __('Update purchases\'s success!'));
    }

    public function update_payment(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $payment = Purchases_payment::find($id);
        if ($payment) {
            if ($request->input('name_code') == 1) {
                $payment->code_bill = $request->input('code');
                $payment->trade_code = 0;
            } else {
                $payment->trade_code = $request->input('code');
                $payment->code_bill = 0;
            }
            $payment->save();
            return redirect(route('admin.purchases.payments'))
                ->with('success', __('Update payment\'s success!'));
        }
        return redirect(route('admin.purchases.payments'))
            ->with('error', __('Update payment\'s has error!'));
    }

    public function update_product($purchase_id, $product_id, Request $request)
    {
        $request->validate([
            'quantity' => 'required|int|min:0',
            'money' => 'required|int|min:0',
        ]);
        $old_product = DB::table('purchases_products')
            ->where([
                ['purchase_id', '=', $purchase_id],
                ['product_id', '=', $product_id]
            ])->first();
        $id = $old_product->id;
        $old_money = $old_product->money;
        $product = Purchases_product::find($id);

        $old_purchase = DB::table('purchases')->where('purchase_id', '=', $purchase_id)->first();
        $temp = $old_purchase->id;
        $purchase = Purchase::find($temp);

        if ($product) {
            $product->quantity = $request->input('quantity');
            $product->money = $request->input('money');

            $purchase->money = $purchase->money - $old_money + $request->input('money');

            $product->save();
            $purchase->save();
        }
        // return redirect(route('admin.purchases.index'))
        //     ->with('success', __('Update success!'));
        return redirect(route('admin.purchases.detail', ['purchase_id' => $purchase_id]));
    }

    public function add_product(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required|int|min:0',
            'money' => 'required|numeric|min:0',
        ]);
        $purchase_id = $request->get('purchase_id');
        $product_id = $request->get('product_id');
        $money = $request->get('money');
        $quantity = $request->get('quantity');
        if (!$validator->fails()) {
            $value = DB::table('purchases_products')
                ->where([
                    ['purchase_id', '=', $purchase_id],
                    ['product_id', '=', $product_id]
                ])->get();
            if ($value->count() == 0) {
                DB::table('purchases_products')->insert([
                    'purchase_id' => $purchase_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'money' => $money
                ]);
                //them gia tri cua don hang
                $old_purchase = DB::table('purchases')->where('purchase_id', '=', $purchase_id)->first();
                $id = $old_purchase->id;
                $purchase = Purchase::find($id);
                $purchase->money = $purchase->money + $money;
                $purchase->save();
                //them san pham
                $row = "<tr><td>" . $purchase_id . "</td><td>" . $product_id . "</td><td>"
                    . $quantity . "</td><td>" . $money . "</td><td><button id='edit' type='button' class='btn btn-success'><i class='fas fa-edit'></i></button>" . "&nbsp" . "<button type='button' class='delete btn btn-danger' data=" . $product_id . "><i class='fas fa-trash'></i></button>";
                echo $row;
            } else echo 'exist';
        } else echo 'error';
    }

    public function add_payment(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'purchase_id' => "required|unique:purchases_payments,purchase_id,{$request->purchase_id}"
        ]);
        $data =  $request->except('_token');
        $data = array_filter($data, 'strlen');
        $purchase = DB::table('purchases')->where('purchase_id','=',$data['purchase_id'])->first();
        if($purchase){
            Purchases_payment::create($data);
            DB::table('purchases')
            ->where('purchase_id','=',$data['purchase_id'])
            ->update(['paid' => 1]);
            return redirect(route('admin.purchases.payments'))
                ->with('success', __('Create payment\'s success!'));
        }
        return redirect(route('admin.purchases.payments'))
                ->with('error', __('Create payment\'s fail because purchase_id is not exist!'));
    }

    public function delete_product(Request $request)
    {
        $product = Purchases_product::find($request->input('id'));

        if ($product) {
            $money = $product->money;
            $purchase_id = $product->purchase_id;
            $old_purchase = DB::table('purchases')->where('purchase_id', '=', $purchase_id)->first();
            $id = $old_purchase->id;
            $purchase = Purchase::find($id);
            $product->delete();
            $purchase->money = $purchase->money - $money;
            $purchase->save();


            echo $request->input('id');
        } else echo "error";
    }

    public function uploadFile(Request $request)
    {
        if ($request->file('file') == null) return redirect(route('admin.transfers.list'))->with('error', __('You need add file .csv!'));
        if ($request->input('submit') != null) {
            $file = $request->file('file');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            // Valid File Extensions
            $valid_extension = array("csv");
            if (in_array(strtolower($extension), $valid_extension)) {
                // File upload location
                $location = 'uploads';

                // Upload file
                $file->move($location, $filename);
                // Import CSV to Database
                $filepath = public_path($location . "/" . $filename);
                // Reading file
                $file = fopen($filepath, "r");

                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata[$c];
                    }
                    $i++;
                }

                fclose($file);
                $num = count($importData_arr);

                //validate data in file csv
                $check_data = true;
                for ($c = 1; $c < $num; $c++) {
                    if (($importData_arr[0][0] != "purchase_id") or ($importData_arr[0][1] != "product_id")
                        or ($importData_arr[0][2] != "quantity") or ($importData_arr[0][3] != "money") or (count($importData_arr[0]) != 4)
                    ) {
                        $check_data = false;
                        break;
                    }
                    $validator = Validator::make($importData_arr[$c], [
                        '0' => 'required',
                        '1' => 'required',
                        '2' => 'required|int|between:0,1000000',
                        '3' => 'required|numeric|between:0,999999999.999',
                    ]);
                    if ($validator->fails()) {
                        $check_data = false;
                    }
                    if ($check_data == false) {
                        break;
                    }
                }
                // Insert to MySQL database
                $check_insert = true;
                if ($check_data) {
                    for ($c = 1; $c < $num; $c++) {

                        $insertData = array(
                            "purchase_id" => $importData_arr[$c][0],
                            "product_id" => $importData_arr[$c][1],
                            "quantity" => $importData_arr[$c][2],
                            "money" => $importData_arr[$c][3]
                        );
                        $check_insert = Purchases_product::insertData($insertData);
                    }
                    if (!$check_insert) {
                        return redirect(route('admin.purchases.index'))->with('success', __('Some data was not added due to already existing or wrong purchase_id  !'));
                    }
                    return redirect(route('admin.purchases.index'))->with('success', __('Import Data\'s success!'));
                }
                return redirect(route('admin.purchases.index'))->with('error', __('The file has error data!'));
            }
            return redirect(route('admin.purchases.index'))->with('error', __('The file is not file .csv!'));
        }
    }

    public function payments()
    {
        $payments = Purchases_payment::orderBy('id', 'DESC')->with('purchase')
            ->paginate();
        return view(
            'admin.purchases.payments',
            [
                'title' => 'Danh sách các đơn hàng đã thanh toán'
            ],
            compact('payments')
        );
    }

    public function delete_payment(Request $request)
    {
        $payment = Purchases_payment::find($request->payment_id);
        $purchase_id = $payment -> purchase_id;
        $purchase = DB::table('purchases')->where('purchase_id','=',$purchase_id)->first();
        if ($payment) {
            $payment->delete();
            if($purchase){
                DB::table('purchases')
                ->where('purchase_id', '=',$purchase_id)
                ->update(['paid' => 0]);
            }
            return redirect(route('admin.purchases.payments'))
                ->with('success', __('Delete Payment\'s success!'));
        }
        return redirect(route('admin.purchases.payments'))
            ->with('info', __('Payment not found!'));
    }

    public function delete_purchase(Request $request){
        $purchase = Purchase::find($request->id);
        if($purchase){
            DB::beginTransaction();
            try {
                Purchases_product::where('purchase_id', $purchase->purchase_id)->delete();
                Purchases_payment::where('purchase_id', $purchase->purchase_id)->delete();
                $purchase->delete();
            } catch (\Throwable $e) {
                DB::rollBack();
                Log::error($e->getMessage(), [$e->getTraceAsString()]);
                return redirect(route('admin.purchases.index'))
                    ->with('error', __('Purchase delete has errors!'));
            }
            DB::commit();
            return redirect(route('admin.purchases.index'))
                ->with('success', __('Delete purchase\'s success!'));
        }
    }
}
