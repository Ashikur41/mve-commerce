<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
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
}
