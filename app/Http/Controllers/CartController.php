<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($id){
        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id; 

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        return redirect()->back();

    }


    public function mycart(){
        $user = Auth::user();
        $user_id = $user->id;

        $cart = Cart::where('user_id', $user_id)->get();

        return view('home.mycart', compact('cart'));
    }


    public function destroy($id){

        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }



    public function confirm_order(Request $request){

        $name = $request->name;
        $place = $request->place;

        $user_id = Auth::user()->id;

        $cart = Cart::where('user_id', $user_id)->get();

        foreach ($cart as $carts) {

            $order = new Order;

            $order->name = $name;
            $order->place = $place;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->save();
            
        }

        $remove_cart = Cart::where('user_id', $user_id)->get();

        foreach ($remove_cart as $remove) {
            $data = Cart::find($remove->id);
            $data-> delete();
        }

        return redirect('/');

    }
}
