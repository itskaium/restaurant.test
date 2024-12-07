<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class WaiterController extends Controller
{
    public function index(){

        Gate::authorize('isWaiter', User::class);

        return view('waiter.dashboard');
    }
}
