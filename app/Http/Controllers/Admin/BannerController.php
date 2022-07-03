<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate(10);
        return view('admin.banners.index',[
            'title' => 'Danh sách Banner',
            'banners' => $banners
        ]);
    }

    public function edit($id)
    {
        $banner = banner::find($id);
        if ($banner) {
            return view('admin.banners.edit', [
                'title' => 'Chỉnh sửa banner',
                'banner' => $banner]);
        }
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $path = $this->_upload($request);
            if ($path) {
                $banner->photo = $path;
            }
            $banner->name = $request->input('name');
            $banner->save();
        }
        return redirect(route('admin.banners.index'))
            ->with('success', __('sửa banner thành công!'));
    }

    public function create()
    {
        $banner = new Banner();
        return view('admin.banners.create',[
            'title' => 'Thêm Banner mới',
            'banner' => $banner
        ])->with('success', __('Thêm Banner thành công!'));
    }

    public function store(BannerRequest $request)
    {
        $data = $request->except('_token');
        $data = array_filter($data, 'strlen');
        $path = $this->_upload($request);
        if ($path) {
            $data['photo'] = $path;
        }
        $banner = Banner::create($data);


        if ($banner) {
            return redirect(route('admin.banners.index'))
                ->with('success', __('Thêm thành công'));
        }
        return redirect(route('admin.banners.index'))
            ->with('error', __('Thêm không thành công!!!!'));;
    }

    public function destroy(Request $request)
    {
        $banner = Banner::find($request->input('banner_id'));
        if ($banner) {
            $banner->delete();
            Storage::delete($banner->photo);
            return redirect(route('admin.banners.index'))
                ->with('success', __('Xóa thành công!'));
        }
        return redirect(route('admin.banners.index'))
            ->with('error', __('xóa không thành công!'));
    }

    private function _upload($request)
    {
        if ($request->hasFile('photo')){
            try {
                $name = $request->file('photo')->getClientOriginalName();
                $pathFull ='uploads/'.date("Y/m/d");
                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
                return '/storage/' . $pathFull . '/' . $name;
            }catch (\Exception $error){
                return false;
            }
        }
        return false;


    }
}
