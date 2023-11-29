<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_testimonial;
use Illuminate\Http\Request;

class TestimonilController extends Controller
{
    // Display Index Page
    public function index()
    {
        $testimonil = tbl_testimonial::latest()->get();
        return view('back/admin/testimonil/index', compact('testimonil'));
    }
    // Display Create Page
    public function create()
    {
        $testimonil = tbl_testimonial::get();
        return view('back/admin/testimonil/create', compact('testimonil'));
    }
    //  Store Data
    public function store(Request $request)
    {
        $request->validate([
            'testimonil_name' => 'required',
            'testimonil_image' => 'required',
            'testimonil_description' => 'required',
        ]);
        // return $request;
        $testimonil = new tbl_testimonial();
        $testimonil->testimonil_name = $request->testimonil_name;
        $testimonil->testimonil_description = $request->testimonil_description;
        // Image Upload
        if ($request->file('testimonil_image')) {
            $file = $request->file('testimonil_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/testimonil', $filename);
            $testimonil->testimonil_image = $filename;
        }
        $testimonil->save();
        return redirect("/admin/testimonil/index")->with('msg', "testimonil created successfully");
    }
    // Display Show Data
    public function view($testimonil_id)
    {
        $testimonil = tbl_testimonial::find($testimonil_id);
        return view("back/admin/testimonil/view", ['testimonil' => $testimonil]);
    }
    // Display Edit Data
    public function edit($testimonil_id)
    {
        $testimonil = tbl_testimonial::find($testimonil_id);
        return view("back/admin/testimonil/edit", ['testimonil' => $testimonil]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $testimonil = tbl_testimonial::find($request->testimonil_id);
        $testimonil->testimonil_name = $request->testimonil_name;
        $testimonil->testimonil_description = $request->testimonil_description;
        // Image Upload
        if ($request->file('testimonil_image')) {
            $file = $request->file('testimonil_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/testimonil', $filename);
            $testimonil->testimonil_image = $filename;
        }
        $testimonil->save();
        return redirect("/admin/testimonil/index")->with('msg', "testimonil updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $testimonil_id)
    {
        $testimonil = tbl_testimonial::find($testimonil_id);
        $testimonil->testimonil_status = $status;
        $testimonil->save();
        return redirect("/admin/testimonil/index")->with('msg', "testimonil Status updated successfully");
    }
}
