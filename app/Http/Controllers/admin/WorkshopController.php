<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    // Display Index Page
    public function index()
    {
        $workshop = tbl_workshop::latest()->get();
        return view('back/admin/workshop/index', compact('workshop'));
    }
    // Display Create Page
    public function create()
    {
        $workshop = tbl_workshop::get();
        return view('back/admin/workshop/create', compact('workshop'));
    }
    //  Store Data
    public function store(Request $request)
    {
        $request->validate([
            'workshop_name' => 'required',
            'workshop_image' => 'required',
            'workshop_description' => 'required',
        ]);
        // return $request;
        $workshop = new tbl_workshop();
        $workshop->workshop_name = $request->workshop_name;
        $workshop->workshop_description = $request->workshop_description;
        // Image Upload
        if ($request->file('workshop_image')) {
            $file = $request->file('workshop_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/workshop', $filename);
            $workshop->workshop_image = $filename;
        }
        $workshop->save();
        return redirect("/admin/workshop/index")->with('msg', "workshop created successfully");
    }
    // Display Edit Data
    public function edit($workshop_id)
    {
        $workshop = tbl_workshop::find($workshop_id);
        return view("back/admin/workshop/edit", ['workshop' => $workshop]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $workshop = tbl_workshop::find($request->workshop_id);
        $workshop->workshop_name = $request->workshop_name;
        $workshop->workshop_description = $request->workshop_description;
        // Image Upload
        if ($request->file('workshop_image')) {
            $file = $request->file('workshop_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/workshop', $filename);
            $workshop->workshop_image = $filename;
        }
        $workshop->save();
        return redirect("/admin/workshop/index")->with('msg', "workshop updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $workshop_id)
    {
        $workshop = tbl_workshop::find($workshop_id);
        $workshop->workshop_status = $status;
        $workshop->save();
        return redirect("/admin/workshop/index")->with('msg', "workshop Status updated successfully");
    }
}
