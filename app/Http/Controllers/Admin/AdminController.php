<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    //Admin Login
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }


    //logout
    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //Admin Profile
    public function AdminProfile(Request $request)
    {
        $id=Auth::user()->id;
        $adminData=User::find($id);

        return view('admin.admin_profile_view',compact('adminData'));
    }
}
