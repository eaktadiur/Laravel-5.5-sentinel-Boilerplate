<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPaawordController extends Controller
{
    public function forgetPassword()
    {
        return view('auth.passwords.email');
    }

    public function postForgetPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (count($user)==0) {

            return redirect()->back()->with([
                'success' => "Reset code send ur email"
            ]);
        }

        $reminder = Reminder::exists($user) ? '' : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);
    }

    public function resetPassword($email, $code)
    {
        $user = User::byEmail($email);

        if (count($user)==0)
            abort(404);

        if ($reminder = Reminder::exists($user)) {
            if ($code == $reminder->code)
                return view('auth.passwords.reset');
            else
                return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function sendEmail($user, $code)
    {
//        $job = (new SendActivationEmail($user, $code))->delay(Carbon::now()->addSecond(10));
//        $this->dispatch($job);
    }
}
