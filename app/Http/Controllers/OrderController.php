<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('manager.order.index', compact('orders'));
    }

    public function myorder_front(){
        $orders = Order::all();
        return view('home.myorder', compact('orders'));
    }

    public function onTheWay($id){
        $data = Order::find($id);
        $data->status = 'on the way';
        $data->save();

        return redirect()->back();
    }

    public function delivered($id){
        $data = Order::find($id);
        $data->status = 'delivered';
        $data->save();

        return redirect()->back();
    }
}
