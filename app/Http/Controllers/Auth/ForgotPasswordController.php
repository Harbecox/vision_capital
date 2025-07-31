<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */


    public function sendResetLinkEmail(Request $request)
    {

        $request->validate([
            "email" => ['required'],
            "secret_question" => ['required'],
            "secret_answer" => ['required'],
        ]);
        $user = User::query()->where("email",$request->get("email"))->first();
        if(!$user){
            return back()->withErrors(['email' => "We can't find a user with that email address."]);

        }else{
            if($user->secret_question != $request->secret_question || $user->secret_answer != $request->secret_answer){
                return back()->withErrors(["secret_question" => "Secret Question and/or Answer not valid"]);
            }
        }

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    use SendsPasswordResetEmails;
}
