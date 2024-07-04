<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $id=Auth::user()->id;
        $UserData=User::find($id);
        return view('index',compact('UserData'));
    }

    // user profile store
    public function UserProfileStore(Request $request)
    {
        $id =Auth::user()->id;
        $data=User::find($id);
        $data->name = $request->full_name;
        $data->username = $request->user_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo'))
        {
            $file= $request->file('photo');
            @unlink(public_path('upload/user_image/'.$data->photo));
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$fileName);
            $data['photo']=$fileName;
        }
        $data->save();

        $notification= array(
            'message'=>'User Profile Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
        //user logout
        public function UserLogout(Request $request)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            $notification= array(
                'message'=>'User Logout Successfully !',
                'alert-type' =>'success'
            );

            return redirect('/login')->with($notification);
        }

    //User Update Password

    public function UserUpdatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        //Match The Old Password

        if(!Hash::check($request->old_password,auth::user()->password))
        {
            return back()->with("error","Old Password Dose't Match!");

        }


        //update the new password
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);
        return back()->with("status","Password Changed Successfully!!");
    }
}