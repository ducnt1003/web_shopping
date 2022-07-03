<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\storeRequest;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::get();
        return view('admin.stores.index',[
            'title' => 'Danh sách cửa hàng',
            'stores' => $stores
        ]);
    }

    public function edit($id)
    {
        $store = Store::find($id);
        if ($store) {
            return view('admin.stores.edit', [
                'title' => 'Chỉnh sửa cửa hàng',
                'store' => $store]);
        }
    }

    public function update(StoreRequest $request, $id)
    {
        $store = Store::find($id);
        if ($store) {
            $store->name = $request->input('name');
            $store->address = $request->input('address');
            $store->phone = $request->input('phone');
            $store->save();
        }
        return redirect(route('admin.stores.index'))
            ->with('success', __('Sửa cửa hàng thành công!'));
    }

    public function create()
    {
        $store = new Store();
        return view('admin.stores.create',[
            'title' => 'Thêm store mới',
            'store' => $store
        ])->with('success', __('Thêm cửa hàng thành công!'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data = array_filter($data, 'strlen');
        $store = Store::create($data);
        if ($store) {
            return redirect(route('admin.stores.index'))
                ->with('success', __('Thêm thành công'));
        }
        return redirect(route('admin.stores.index'))
            ->with('error', __('Thêm không thành công!!!!'));;
    }

    public function destroy(Request $request)
    {
        $store = Store::find($request->input('store_id'));
        if ($store) {
            $store->delete();
            //Storage::delete($store->photo);
            return redirect(route('admin.stores.index'))
                ->with('success', __('Xóa thành công!'));
        }
        return redirect(route('admin.stores.index'))
            ->with('error', __('xóa không thành công!'));
    }
}
