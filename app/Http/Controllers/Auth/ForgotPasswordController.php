<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Client;

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

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a reset password request for the application.
     * 
     * @param  ForgotPasswordRequest $request 
     * @return \Illuminate\Http\Response        
     */
    public function reset(ForgotPasswordRequest $request)
    {
        $response = Client::setEndpoint('password/reset')->setBody($request->only('email'))->post();
        
        if ($response['code'] != 200) {
            return redirect()->back()->withInput()->with([
                'error-forgot-password' => trans('validation.exists', ['attribute' => 'email'])
            ]);
        }

        return redirect()->route('auth.password.success');
    }

    /**
     * Handle a reset password request for the application.
     * 
     * @return \Illuminate\Http\Response        
     */
    public function successForgot()
    {
        return view('auth.success-forgot');
    }
}
