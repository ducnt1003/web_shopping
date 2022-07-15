<?php


namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function store($request)
    {

        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull ='uploads/'.date("Y/m/d");
                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
                return '/storage/' . $pathFull . '/' . $name;

                // $path = $request->file('file')->store('images','s3');
                // $request->merge([
                //     'size' => $request->file->getClientSize(),
                //     'path' => $path
                // ]);

                // $this->image->create($request->only('path', 'title', 'size'));
                // $path = Storage::disk('s3')->put('images', $request->file('file'));
                // $path = Storage::disk('s3')->url($path);
                // return $path;
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
