<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function AllBlogCategory()
    {
        $blogCategory =BlogCategory::latest()->get();

        return view('Backend.blog.blog_category',compact('blogCategory'));
    }

    public function AddBlogCategory()
    {
        return view('Backend.blog.add_blog_category');
    }

    public function StoreBlogCategory(Request $request)
    {
        $data=new BlogCategory();
        $data->blog_category_name=$request->blog_category_name;
        $data->blog_category_slug=strtolower(str_replace('','-',$request->blog_category_name));

        $data->save();

        $notification= array(
            'message'=>'Blog Category Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $editBlogCategory = BlogCategory::findOrFail($id);

        return view('Backend.blog.edit_blog_category',compact('editBlogCategory'));
    }

    public function UpdateBlogCategory(Request $request,$id)
    {

        $data=BlogCategory::findOrFail($id);
        $data->blog_category_name=$request->blog_category_name;
        $data->blog_category_slug=strtolower(str_replace('','-',$request->blog_category_name));

        $data->update();

        $notification= array(
            'message'=>'Blog Category Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Blog Category Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}