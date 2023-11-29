<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_blog;
use App\Models\tbl_client;
use App\Models\tbl_consultancy;
use App\Models\tbl_inquiry;
use App\Models\tbl_testimonial;
use App\Models\tbl_training;
use App\Models\tbl_workshop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        // $users = User::get();
        
        $blog = tbl_blog::count();
        $client = tbl_client::count();
        $consultancy = tbl_consultancy::count();
        $inquiry = tbl_inquiry::count();
        $testimonial = tbl_testimonial::count();
        $training = tbl_training::count();
        $workshop = tbl_workshop::count();
        return view('back/admin/dashboard', compact('blog', 'client', 'consultancy', 'inquiry', 'testimonial', 'training', 'workshop'));
    }
    public function profile()
    {

        return view('back/admin/profile/view');
    }
    public function updated(Request $request)
    {

        $associate =  User::find($request->id);
        $associate->name = $request->name;
        $associate->email = $request->email;
        if ($request->password) {
            $associate->password  = Hash::make($request->password);
        }
        $associate->save();
        return redirect()->back()->with('msg', 'Admin Update Successfully !');
    }
}
