<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Client;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $response = Client::setEndpoint('auth/login')->setBody($this->credentials($request))->post();
        
        if ($response['code'] != 200) {
            return redirect()->back()->withInput()->with([
                'error-login' => trans('auth.failed')
            ]);
        }

        session([ 'authenticate' => $response['contents'] ]);
        return $this->redirectToRole();
    }

    /**
     * This check role of user and redirect to page
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function redirectToRole()
    {
        switch ( session('authenticate.role') ) {
            case 'developer' : return view('welcome');
            case 'customer'  : return $this->redirectIfCustomer();
            default : return $this->redirectIfCustomer();
        }
    }

    /**
     * This check if customer have a register complete or not
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function redirectIfCustomer()
    {
        if ( ! session('authenticate.is_register_simple') ) {
            return redirect()->route('auth.register.simple');
        }

        if ( ! session('authenticate.is_register_completed') ) {
            return redirect()->route('auth.register.complete');
        }

        return redirect()->route('homepage');
    }
}
