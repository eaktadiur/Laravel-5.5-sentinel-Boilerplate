<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        try {
            $rememberMe = false;
            if (isset($request->remember_me))
                $rememberMe = true;

            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                // redirect condition need to apply

                return redirect()->route('home');
            } else {
                return redirect()->back()->with([
                    'error' => 'Wrong credential'
                ]);
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
//            dd($delay);

            return redirect()->back()->with([
                'error' => 'You are bound for ' . $delay . ' seconds'
            ]);

        } catch (NotActivatedException $e) {
            return redirect()->back()->with([
                'error' => 'Not activated'
            ]);
        }


    }

    public function postLogout(Request $request)
    {
        Sentinel::logout();
        return redirect()->route('login');
    }
}
