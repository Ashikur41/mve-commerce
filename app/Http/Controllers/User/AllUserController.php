<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.user_dashboard.user_orders_page',compact('orders'));
    }

    public function UserOrdersDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',
        Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.order.order_details',compact('order','orderItem'));
    }

    public function UserOrdersInvoice($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',
        Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir'=>public_path(),
            'chroot'=> public_path(),
        ]);
        return $pdf->download('invoice.pdf');


    }
}
