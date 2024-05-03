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

    //////////////////////// Blog Post /////////////////////

    public function AllBlogPost()
    {
        $AllblogPost =BlogPost::latest()->get();

        return view('Backend.blog.post.all_post',compact('AllblogPost'));
    }

    public function AddBlogPost()
    {
        $blogCategories =BlogCategory::latest()->get();
        return view('Backend.blog.post.add_post',compact('blogCategories'));
    }

    public function StoreBlogPost(Request $request)
    {
        $data=new BlogPost();
        $data->category_id=$request->category_id;
        $data->post_title=$request->post_title;
        $data->post_slug=strtolower(str_replace('','-',$request->post_title));
        $data->post_short_description=$request->post_short_description;
        $data->post_long_description=$request->post_long_description;
        if($request->file('post_image'))
        {
            $file= $request->file('post_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/blog_post'),$fileName);
            $data['post_image']=$fileName;
        }
        $data->save();

        $notification= array(
            'message'=>'Blog Post Inserted Successfully!',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.post')->with($notification);
    }


    public function EditBlogPost($id)
    {
        $editBlogPost = BlogPost::findOrFail($id);
        $blogCategories =BlogCategory::latest()->get();
        return view('Backend.blog.post.edit_post',compact('editBlogPost','blogCategories'));
    }

    public function UpdateBlogPost(Request $request,$id)
    {
        $data= BlogPost::findOrFail($id);
        $data->category_id=$request->category_id;
        $data->post_title=$request->post_title;
        $data->post_slug=strtolower(str_replace('','-',$request->post_title));
        $data->post_short_description=$request->post_short_description;
        $data->post_long_description=$request->post_long_description;
        if($request->file('post_image'))
        {
            $file= $request->file('post_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/blog_post'),$fileName);
            $data['post_image']=$fileName;
        }
        $data->update();

        $notification= array(
            'message'=>'Blog Post Updated Successfully!',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.post')->with($notification);
    }



    public function DeleteBlogPost($id)
    {
        BlogPost::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Blog Post Deleted Successfully!',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    /////////// blog Frontend ///////////////

    public function AllBlog(){
        $blogcategoryies = BlogCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.home_blog',compact('blogcategoryies','blogpost'));
    }// End Method

    public function BlogDetails($id,$slug){
        $blogcategoryies = BlogCategory::latest()->get();
        $blogdetails = BlogPost::findOrFail($id);
        $breadcat = BlogCategory::where('id',$id)->get();
        return view('frontend.blog.blog_details',compact('blogcategoryies','blogdetails','breadcat'));

    }// End Method

    public function BlogPostCategory($id,$slug){
        $blogcategoryies = BlogCategory::latest()->get();
        $blogpost = BlogPost::where('category_id',$id)->get();
        $breadcat = BlogCategory::where('id',$id)->get();
        return view('frontend.blog.category_post',compact('blogcategoryies','blogpost','breadcat'));

    }// End Method
}