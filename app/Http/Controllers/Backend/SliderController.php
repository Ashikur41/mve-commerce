<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function AllSlider()
    {
        $sliderAll=Slider::all();
        return view('Backend.slider.all_slider',compact('sliderAll'));
    }

    public function AddSlider()
    {
        return view('Backend.slider.slider_add');
    }

    public function StoreSlider(Request $request)
    {
        $data=new Slider();
        $data->slider_title=$request->slider_title;
        $data->short_title=$request->short_title;
        if($request->file('slider_image'))
        {
            $file= $request->file('slider_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider'),$fileName);
            $data['slider_image']=$fileName;
        }
        $data->save();

        $notification= array(
            'message'=>'Slider Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.slider')->with($notification);
    }

    public function EditSlider($id)
    {
        $EditSlider=Slider::findOrFail($id);
        return view('Backend.slider.slider_edit',compact('EditSlider'));
    }

    public function UpdateSlider(Request $request)
    {
        $slider_id=$request->id;
        $old_img=$request->old_image;
        $data=Slider::findOrFail($slider_id);
        $data->slider_title=$request->slider_title;
        $data->short_title=$request->short_title;
        if($request->file('slider_image'))
        {
            $file= $request->file('slider_image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider'),$fileName);
            $data['slider_image']=$fileName;
        }

        $data->update();

        $notification= array(
            'message'=>'Slider Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.slider')->with($notification);
    }

    public function DeleteSlider($id)
    {
        Slider::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Slider Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

}
