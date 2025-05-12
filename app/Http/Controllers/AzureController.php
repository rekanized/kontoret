<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class AzureController extends Controller
{
    public function testAzureSetup(Request $request){
        $azureTest = true;

        return view('first-setup.index', compact('azureTest'));
    }
}