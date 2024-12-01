<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $user = Auth::user();
        $user_id = '';
        if(!empty($user)){
            $user_id = $user->id;
        }
        $user_id ="";

        $current_user = User::find($user_id);
        // $user_role = $current_user->role;

        // dd($current_user->role);

        $count = Cart::where('user_id', $user_id)->count();

        return view('home.index', compact('products','count', 'current_user'));
    }
}
