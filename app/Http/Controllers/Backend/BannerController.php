<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function AllBanner()
    {
        $bannerAll=Banner::all();
        return view('Backend.banner.all_banner',compact('bannerAll'));
    }
    public function AddBanner()
    {
        return view('Backend.banner.banner_add');
    }
    public function StoreBanner(Request $request)
    {
        $data=new Banner();
        $data->banner_title=$request->banner_title;
        $data->banner_url=$request->banner_url;
        if($request->file('banner_image'))
        {
            $file= $request->file('banner_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/banner'),$fileName);
            $data['banner_image']=$fileName;
        }
        $data->save();

        $notification= array(
            'message'=>'Banner Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.banner')->with($notification);
    }
    public function EditBanner($id)
    {
        $EditBanner=Banner::findOrFail($id);
        return view('Backend.banner.banner_edit',compact('EditBanner'));
    }
    public function UpdateBanner(Request $request)
    {
        $banner_id=$request->id;
        $old_img=$request->old_image;
        $data=Banner::findOrFail($banner_id);
        $data->banner_title=$request->banner_title;
        $data->banner_url=$request->banner_url;
        if($request->file('banner_image'))
        {
            $file= $request->file('banner_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/banner'),$fileName);
            $data['banner_image']=$fileName;
        }

        $data->update();

        $notification= array(
            'message'=>'Banner Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.banner')->with($notification);
    }
    public function DeleteBanner($id)
    {
        Banner::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Banner Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
