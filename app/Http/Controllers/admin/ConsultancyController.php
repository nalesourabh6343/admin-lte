<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_consultancy;
use Illuminate\Http\Request;

class ConsultancyController extends Controller
{
    // Display Index Page
    public function index()
    {
        $consultancy = tbl_consultancy::latest()->get();
        return view('back/admin/consultancy/index', compact('consultancy'));
    }
    // Display Create Page
    public function create()
    {
        $consultancy = tbl_consultancy::get();
        return view('back/admin/consultancy/create', compact('consultancy'));
    }
    //  Store Data
    public function store(Request $request)
    {
        $request->validate([
            'consultancy_name' => 'required',
            'consultancy_image' => 'required',
            'consultancy_description' => 'required',
        ]);
        // return $request;
        $consultancy = new tbl_consultancy();
        $consultancy->consultancy_name = $request->consultancy_name;
        $consultancy->consultancy_description = $request->consultancy_description;
        // Image Upload
        if ($request->file('consultancy_image')) {
            $file = $request->file('consultancy_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/consultancy', $filename);
            $consultancy->consultancy_image = $filename;
        }
        $consultancy->save();
        return redirect("/admin/consultancy/index")->with('msg', "consultancy created successfully");
    }
    // Display Edit Data
    public function edit($consultancy_id)
    {
        $consultancy = tbl_consultancy::find($consultancy_id);
        return view("back/admin/consultancy/edit", ['consultancy' => $consultancy]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $consultancy = tbl_consultancy::find($request->consultancy_id);
        $consultancy->consultancy_name = $request->consultancy_name;
        $consultancy->consultancy_description = $request->consultancy_description;
        // Image Upload
        if ($request->file('consultancy_image')) {
            $file = $request->file('consultancy_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/consultancy', $filename);
            $consultancy->consultancy_image = $filename;
        }
        $consultancy->save();
        return redirect("/admin/consultancy/index")->with('msg', "consultancy updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $consultancy_id)
    {
        $consultancy = tbl_consultancy::find($consultancy_id);
        $consultancy->consultancy_status = $status;
        $consultancy->save();
        return redirect("/admin/consultancy/index")->with('msg', "consultancy Status updated successfully");
    }
}
