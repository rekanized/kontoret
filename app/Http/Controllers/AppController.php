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

    public function firstSetup(){
        if(User::all()->isEmpty()){
            return view('first-setup.index');
        }

        // Optionally, redirect elsewhere if setup is not needed
        return redirect()->route('home');
    }
}