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
}