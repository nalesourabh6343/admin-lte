<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_compress;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CompressController extends Controller
{
    // Display Index Page
    public function index()
    {
        $compress = tbl_compress::latest()->get();
        return view('back/admin/compress/index', compact('compress'));
    }
    // Display Create Page
    public function create()
    {
        $compress = tbl_compress::get();
        return view('back/admin/compress/create', compact('compress'));
    }
    //  Store Data


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'compress_name' => 'required',
    //         'compress_image' => 'required',
    //     ]);
    //     // return $request;
    //     $compress = new tbl_compress();
    //     $compress->compress_name = $request->compress_name;
    //     // Image Upload
    //     if ($request->file('compress_image')) {
    //         $file = $request->file('compress_image');
    //         $extension = $file->getcompressOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/compress', $filename);
    //         $compress->compress_image = $filename;
    //     }
    //     $compress->save();
    //     return redirect("/admin/compress/index")->with('msg', "compress created successfully");
    // }

    public function store(Request $request)
    {
        $request->validate([
            'compress_name' => 'required',
            'compress_image' => 'required' // Add image validation rules
        ]);
        // |image|mimes:jpeg,png,jpg,gif|max:2048
        $compress = new tbl_compress();
        $compress->compress_name = $request->compress_name;

        // Image Upload
        if ($request->file('compress_image')) {
            $image = $request->file('compress_image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('uploads/compress') . '/' . $filename;

            // Compress and save the image
            Image::make($image->getRealPath())
                ->resize(800, null, function ($constraint) {
                    // jar asdf.jpg hi 2.43 mb chi image 
                    // 800 la 75 kb 
                    // 1200 la 171 kb 
                    // 1400 la 243 kb 
                    // 100 la 3.25 kb 

                    $constraint->aspectRatio();
                })
                ->save($path);

            $compress->compress_image = 'uploads/compress/' . $filename;
        }

        $compress->save();
        return redirect("/admin/compress/index")->with('msg', "Compress image created successfully");
    }


    // Display Edit Data
    public function edit($compress_id)
    {
        $compress = tbl_compress::find($compress_id);
        return view("back/admin/compress/edit", ['compress' => $compress]);
    }
    // Display Edit Data
    public function view($compress_id)
    {
        $compress = tbl_compress::find($compress_id);
        return view("back/admin/compress/view", ['compress' => $compress]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $compress = tbl_compress::find($request->compress_id);
        $compress->compress_name = $request->compress_name;
        // Image Upload
        if ($request->file('compress_image')) {
            $file = $request->file('compress_image');
            $extension = $file->getcompressOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/compress', $filename);
            $compress->compress_image = $filename;
        }
        $compress->save();
        return redirect("/admin/compress/index")->with('msg', "compress updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $compress_id)
    {
        $compress = tbl_compress::find($compress_id);
        $compress->compress_status = $status;
        $compress->save();
        return redirect("/admin/compress/index")->with('msg', "compress Status updated successfully");
    }
}
