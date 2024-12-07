<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ManagerController extends Controller
{
    public function index(){

        Gate::authorize('isManager', User::class);

        return view('manager.dashboard');
    }
}
