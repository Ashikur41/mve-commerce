<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function AllSub_category()
    {
        $subcategory=SubCategory::latest()->get();
        return view('Backend.subcategory.all_subcategory',compact('subcategory'));
    }

    public function AddSub_category()
    {
        $category=Category::orderBy('category_name','ASC')->get();
        return view('Backend.subcategory.subcategory_add',compact('category'));
    }

    public function StoreSub_category(Request $request)
    {
        $data=new SubCategory();
        $data->category_id=$request->category_id;
        $data->sub_category_name=$request->sub_category_name;
        $data->sub_category_slug=strtolower(str_replace('','-',$request->sub_category_name));
        $data->save();

        $notification= array(
            'message'=>'SubCategory Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.sub_category')->with($notification);
    }

    public function EditSub_category($id)
    {
        $subcategory=SubCategory::findOrFail($id);
        $category=Category::orderBy('category_name','ASC')->get();
        return view('Backend.subcategory.subcategory_edit',compact('subcategory','category'));
    }

    public function UpdateSub_category(Request $request)
    {
        $subcategory_id=$request->id;
        $data=SubCategory::findOrFail($subcategory_id);
        $data->category_id=$request->category_id;
        $data->sub_category_name=$request->sub_category_name;
        $data->sub_category_slug=strtolower(str_replace('','-',$request->sub_category_name));
        $data->update();

        $notification= array(
            'message'=>'SubCategory Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.sub_category')->with($notification);
    }

    public function DeleteSub_category($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification= array(
            'message'=>'SubCategory Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // Category and SubCategory related
    public function GetSubcategory($category_id)
    {
        $subCat=SubCategory::where('category_id',$category_id)->orderBy('sub_category_name','ASC')->get();
        return json_encode($subCat);
    }
}
