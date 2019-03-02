<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $orders = Order::latest()->get();
        return view('admin.pages.order.index',compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        $order->is_seen_by_admin =1;
        $order->save();
        return view('admin.pages.order.show',compact('order'));
    }

    public function completed($id){
        $order = Order::find($id);
        if ($order->is_completed){
            $order->is_completed = 0;
        }else{
            $order->is_completed = 1;
        }
        $order->save();
        return back();

    }
    public function paid($id){
        $order = Order::find($id);
        if ($order->is_paid){
            $order->is_paid = 0;
        }else{
            $order->is_paid = 1;
        }
        $order->save();
        return back();

    }

    public  function delete($id){
        $order = Order::find($id);
        $order->delete();
        return back();
    }
}
