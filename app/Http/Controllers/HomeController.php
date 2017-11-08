<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return Sentinel::getUser();
        $message = 'rajib';
        $user = User::all()->first();
         event(new ChatEvent($message, $user));
        return view('home');
    }
}
