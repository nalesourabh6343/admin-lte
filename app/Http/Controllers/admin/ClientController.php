<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Display Index Page
    public function index()
    {
        $client = tbl_client::latest()->get();
        return view('back/admin/client/index', compact('client'));
    }
    // Display Create Page
    public function create()
    {
        $client = tbl_client::get();
        return view('back/admin/client/create', compact('client'));
    }
    //  Store Data
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'client_image' => 'required',
        ]);
        // return $request;
        $client = new tbl_client();
        $client->client_name = $request->client_name;
        // Image Upload
        if ($request->file('client_image')) {
            $file = $request->file('client_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/client', $filename);
            $client->client_image = $filename;
        }
        $client->save();
        return redirect("/admin/client/index")->with('msg', "client created successfully");
    }
    // Display Edit Data
    public function edit($client_id)
    {
        $client = tbl_client::find($client_id);
        return view("back/admin/client/edit", ['client' => $client]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $client = tbl_client::find($request->client_id);
        $client->client_name = $request->client_name;
        // Image Upload
        if ($request->file('client_image')) {
            $file = $request->file('client_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/client', $filename);
            $client->client_image = $filename;
        }
        $client->save();
        return redirect("/admin/client/index")->with('msg', "client updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $client_id)
    {
        $client = tbl_client::find($client_id);
        $client->client_status = $status;
        $client->save();
        return redirect("/admin/client/index")->with('msg', "client Status updated successfully");
    }
}
