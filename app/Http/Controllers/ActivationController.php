<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($email, $code){
        $user = User::whereEmail($email)->first();

        if(Activation::complete($user, $code)){
            return redirect()->route('login');
        }else{

        }
    }
}
