<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    // Display Index Page
    public function index()
    {
        $training = tbl_training::latest()->get();
        return view('back/admin/training/index', compact('training'));
    }
    // Display Create Page
    public function create()
    {
        $training = tbl_training::get();
        return view('back/admin/training/create', compact('training'));
    }
    //  Store Data
    public function store(Request $request)
    {
        $request->validate([
            'training_name' => 'required',
            'training_image' => 'required',
            'training_description' => 'required',
        ]);
        // return $request;
        $training = new tbl_training();
        $training->training_name = $request->training_name;
        $training->training_description = $request->training_description;
        // Image Upload
        if ($request->file('training_image')) {
            $file = $request->file('training_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/training', $filename);
            $training->training_image = $filename;
        }
        $training->save();
        return redirect("/admin/training/index")->with('msg', "Training created successfully");
    }
    // Display Edit Data
    public function edit($training_id)
    {
        $training = tbl_training::find($training_id);
        return view("back/admin/training/edit", ['training' => $training]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $training = tbl_training::find($request->training_id);
        $training->training_name = $request->training_name;
        $training->training_description = $request->training_description;
        // Image Upload
        if ($request->file('training_image')) {
            $file = $request->file('training_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/training', $filename);
            $training->training_image = $filename;
        }
        $training->save();
        return redirect("/admin/training/index")->with('msg', "Training updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $training_id)
    {
        $training = tbl_training::find($training_id);
        $training->training_status = $status;
        $training->save();
        return redirect("/admin/training/index")->with('msg', "Training Status updated successfully");
    }
}
