<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Models\User;

class AppController extends Controller
{
    public function index() {
        $authUser = Auth::user();
    }

    public function dashboard(){
        if(User::all()->isEmpty()){
            return view('dashboard.index');
        }

        // Redirect to main app if setup is already done
        return view('app');
    }
}