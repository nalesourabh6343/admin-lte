<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    // Display Index Page
    public function index()
    {
        $inquiry = tbl_inquiry::latest()->get();
        return view('back/admin/inquiry/index', compact('inquiry'));
    }
    public function delete($inquiry_id)
    {
        $inquiry = tbl_inquiry::find($inquiry_id);
        $inquiry->delete();
        return redirect()->back()->with("msg", "Inquiry Successfully Deleted.");
    }
    
}