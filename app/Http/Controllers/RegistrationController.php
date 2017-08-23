<?php

namespace App\Http\Controllers;

use App\Jobs\SendActivationEmail;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {

        $user = Sentinel::register($request->all());
        if ($user) {
            $role = Sentinel::findRoleBySlug('admin');
            $activation = Activation::create($user);

            $this->sendEmail($user, $activation->code);

            $role->users()->attach($user);
            return redirect()->route('login');
        } else {
            return redirect()->back()->with([
                'error' => 'Wrong credential'
            ]);
        }
    }

    public function sendEmail($user, $code)
    {
        $job = (new SendActivationEmail($user, $code))->delay(Carbon::now()->addSecond(10));
        $this->dispatch($job);
    }
}
