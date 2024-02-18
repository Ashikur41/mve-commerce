<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AllUserController extends Controller
{
    public function UserAccountDetails(){

        $id=Auth::user()->id;
        $UserData=User::find($id);
        return view('frontend.user_dashboard.account_details',compact('UserData'));
    }

    public function UserChangePassword(){

        return view('frontend.user_dashboard.user_change_password');
    }

    public function UserOrdersPage(){

        return view('frontend.user_dashboard.user_orders_page');
    }
}
