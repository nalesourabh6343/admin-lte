<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display Index Page
    public function index()
    {
        $blog = tbl_blog::latest()->get();
        return view('back/admin/blog/index', compact('blog'));
    }
    // Display Create Page
    public function create()
    {
        $blog = tbl_blog::get();
        return view('back/admin/blog/create', compact('blog'));
    }
    //  Store Data
    public function store(Request $request)
    {
        $request->validate([
            'blog_name' => 'required',
            'blog_image' => 'required',
            'blog_description' => 'required',
        ]);
        // return $request;
        $blog = new tbl_blog();
        $blog->blog_name = $request->blog_name;
        $blog->blog_description = $request->blog_description;
        // Image Upload
        if ($request->file('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blog', $filename);
            $blog->blog_image = $filename;
        }
        $blog->save();
        return redirect("/admin/blog/index")->with('msg', "blog created successfully");
    }
    // Display Show Data
    public function view($blog_id)
    {
        $blog = tbl_blog::find($blog_id);
        return view("back/admin/blog/view", ['blog' => $blog]);
    }
    // Display Edit Data
    public function edit($blog_id)
    {
        $blog = tbl_blog::find($blog_id);
        return view("back/admin/blog/edit", ['blog' => $blog]);
    }
    // Display Update Data
    public function update(Request $request)
    {
        // return $request;
        $blog = tbl_blog::find($request->blog_id);
        $blog->blog_name = $request->blog_name;
        $blog->blog_description = $request->blog_description;
        // Image Upload
        if ($request->file('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blog', $filename);
            $blog->blog_image = $filename;
        }
        $blog->save();
        return redirect("/admin/blog/index")->with('msg', "blog updated successfully");
    }
    // Change Status Active / Inactive
    public function UpdateStatus($status, $blog_id)
    {
        $blog = tbl_blog::find($blog_id);
        $blog->blog_status = $status;
        $blog->save();
        return redirect("/admin/blog/index")->with('msg', "blog Status updated successfully");
    }
}
