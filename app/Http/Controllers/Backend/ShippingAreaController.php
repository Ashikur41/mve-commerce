<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistricts;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function AllDivision(){
        $division = ShipDivision::latest()->get();

        return view('Backend.ship.division.division_all',compact('division'));
    }

    public function AddDivision(){

        return view('Backend.ship.division.division_add');
    }

    public function StoreDivision(Request $request){
        $data=new ShipDivision();
        $data->division_name=$request->division_name;
        $data->save();

        $notification= array(
            'message'=>'ShipDivision Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.division')->with($notification);
    }

    public function EditDivision($id){

        $division = ShipDivision::findOrFail($id);

        return view('Backend.ship.division.division_edit',compact('division'));
    }

    public function UpdateDivision(Request $request){
        $division_id=$request->id;
        $data=ShipDivision::findOrFail($division_id);
        $data->division_name=$request->division_name;
        $data->update();

        $notification= array(
            'message'=>'ShipDivision Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.division')->with($notification);
    }

    public function DeleteDivision($id)
    {
        ShipDivision::findOrFail($id)->delete();
        $notification= array(
            'message'=>'ShipDivision Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // District all function

    public function AllDistrict(){

        $district = ShipDistricts::latest()->get();
        return view('Backend.ship.district.district_all',compact('district'));
    }

    public function AddDistrict(){

        $division= ShipDivision::latest()->get();
        return view('Backend.ship.district.district_add',compact('division'));
    }

    public function StoreDistrict(Request $request){
        $data=new ShipDistricts();
        $data->division_id=$request->division_id;
        $data->district_name=$request->district_name;
        $data->save();

        $notification= array(
            'message'=>'ShipDistrict Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.district')->with($notification);
    }

    public function EditDistrict($id){

        $district =ShipDistricts::findOrFail($id);
        $division= ShipDivision::latest()->get();
        return view('Backend.ship.district.district_edit',compact('district','division'));
    }

    public function UpdateDistrict(Request $request){
        $district_id=$request->id;
        $data=ShipDistricts::findOrFail($district_id);
        $data->division_id=$request->division_id;
        $data->district_name=$request->district_name;
        $data->update();

        $notification= array(
            'message'=>'ShipDistrict Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.district')->with($notification);
    }

    public function DeleteDistrict($id)
    {
        ShipDistricts::findOrFail($id)->delete();
        $notification= array(
            'message'=>'ShipDistrict Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    // state All function

    public function AllState(){

        $state = ShipState::latest()->get();
        return view('Backend.ship.state.state_all',compact('state'));
    }

    public function AddState(){

        $division = ShipDivision::latest()->get();
        $district = ShipDistricts::latest()->get();
        return view('Backend.ship.state.state_add',compact('division','district'));
    }

    public function StoreState(Request $request){
        $data=new ShipState();
        $data->division_id=$request->division_id;
        $data->district_id=$request->district_id;
        $data->state_name=$request->state_name;
        $data->save();

        $notification= array(
            'message'=>'ShipState Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.state')->with($notification);
    }

    public function GetDistrict($division_id){

        $district = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();

                return json_encode($district);
    }

    public function EditState($id){

        $state= ShipState::findOrFail($id);
        $division = ShipDivision::latest()->get();
        $district = ShipDistricts::latest()->get();

        return view('Backend.ship.state.state_edit',compact('state','division','district'));

    }

    public function UpdateState(Request $request){
        $state_id=$request->id;
        $data=ShipState::findOrFail($state_id);
        $data->division_id=$request->division_id;
        $data->district_id=$request->district_id;
        $data->state_name=$request->state_name;
        $data->update();

        $notification= array(
            'message'=>'ShipState Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.state')->with($notification);
    }

    public function DeleteState($id)
    {
        ShipState::findOrFail($id)->delete();
        $notification= array(
            'message'=>'ShipState Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

}
