<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function AllCoupon(){
        $coupon = Coupon::latest()->get();
        return view('Backend.coupon.coupon_all',compact('coupon'));
    }

    public function AddCoupon(){

        return view('Backend.coupon.coupon_add');
    }

    public function StoreCoupon(Request $request){
        $data=new Coupon();
        $data->coupon_name=strtoupper($request->coupon_name);
        $data->coupon_discount=$request->coupon_discount;
        $data->coupon_validity=$request->coupon_validity;
        $data->	created_at=Carbon::now();
        $data->save();

        $notification= array(
            'message'=>'Coupon Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.coupon')->with($notification);
    }

    public function EditCoupon($id){
        $coupon = Coupon::findOrFail($id);

        return view('Backend.coupon.coupon_edit',compact('coupon'));
    }

    public function UpdateCoupon(Request $request){
        $coupon_id=$request->id;
        $data=Coupon::findOrFail($coupon_id);
        $data->coupon_name=strtoupper($request->coupon_name);
        $data->coupon_discount=$request->coupon_discount;
        $data->coupon_validity=$request->coupon_validity;
        $data->updated_at=Carbon::now();
        $data->update();

        $notification= array(
            'message'=>'Coupon Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.coupon')->with($notification);
    }

    public function DeleteCoupon($id)
    {
        Coupon::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Coupon Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
