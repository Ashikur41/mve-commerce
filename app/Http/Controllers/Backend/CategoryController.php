<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $category=Category::latest()->get();
        return view('Backend.category.all_category',compact('category'));
    }

    public function AddCategory()
    {
        return view('Backend.category.category_add');
    }

    public function StoreCategory(Request $request)
    {
        $data=new Category();
        $data->category_name=$request->category_name;
        $data->category_slug=strtolower(str_replace('','-',$request->category_name));
        if($request->file('category_image'))
        {
            $file= $request->file('category_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category'),$fileName);
            $data['category_image']=$fileName;
        }
        $data->save();

        $notification= array(
            'message'=>'Category Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category=Category::findOrFail($id);
        return view('Backend.category.category_edit',compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id=$request->id;
        $old_img=$request->old_image;
        $data=Category::findOrFail($category_id);
        $data->category_name=$request->category_name;
        $data->category_slug=strtolower(str_replace('','-',$request->category_name));
        if($request->file('category_image'))
        {
            $file= $request->file('category_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category'),$fileName);
            $data['category_image']=$fileName;
        }
        if(file_exists($old_img)){
            unlink($old_img);
        }
        $data->update();

        $notification= array(
            'message'=>'Category Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Category Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
