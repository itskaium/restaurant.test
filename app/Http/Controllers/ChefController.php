<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class ChefController extends Controller
{
    public function index(){

        Gate::authorize('isChef', User::class);

        return view('kitchen.dashboard');
    }
}
