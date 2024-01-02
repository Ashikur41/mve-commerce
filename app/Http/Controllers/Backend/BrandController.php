<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands=Brand::latest()->get();
        return view('Backend.brand.all_brand',compact('brands'));
    }

    public function AddBrand()
    {
        return view('Backend.brand.brand_add');
    }

    public function StoreBrand(Request $request)
    {
        $data=new Brand();
        $data->brand_name=$request->brand_name;
        $data->brand_slug=strtolower(str_replace('','-',$request->brand_name));
        if($request->file('brand_image'))
        {
            $file= $request->file('brand_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brand'),$fileName);
            $data['brand_image']=$fileName;
        }
        $data->save();

        $notification= array(
            'message'=>'Brand Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.brand')->with($notification);
    }

    public function EditBrand($id)
    {
        $brand=Brand::findOrFail($id);
        return view('Backend.brand.brand_edit',compact('brand'));
    }

    public function UpdateBrand(Request $request)
    {
        $brand_id=$request->id;
        $old_img=$request->old_image;
        $data=Brand::findOrFail($brand_id);
        $data->brand_name=$request->brand_name;
        $data->brand_slug=strtolower(str_replace('','-',$request->brand_name));
        if($request->file('brand_image'))
        {
            $file= $request->file('brand_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brand'),$fileName);
            $data['brand_image']=$fileName;
        }
        if(file_exists($old_img)){
            unlink($old_img);
        }
        $data->update();

        $notification= array(
            'message'=>'Brand Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.brand')->with($notification);
    }


    

}
