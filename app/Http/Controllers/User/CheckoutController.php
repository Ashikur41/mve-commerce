<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistricts;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){
        $ship = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        dd($ship);
        return json_encode($ship);
    }
}
