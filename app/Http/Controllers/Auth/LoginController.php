<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Traits\Profileble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers, Profileble;

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
        $response = Client::setEndpoint('auth/login')
        ->setHeaders([
                 'long' => $request['hidden-long'],  
                 'lat' =>  $request['hidden-lat'],  
                 'auditaction' => 'login',
            ]
        )
        ->setBody($this->credentials($request))->post();
        
        if ($response['code'] != 200) {
            return redirect()->back()->withInput()->with([
                'error-login' => $response['descriptions']
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
            case 'developer' : return $this->redirectIfDeveloper();
            case 'customer'  : return $this->redirectIfCustomer();
            case 'others'    : return $this->redirectIfOther();
            case 'developer-sales' : return $this->redirectIfDeveloperSales();
            default : return $this->redirectIfCustomer();
        }
    }
    /**
     * This check if customer have a register complete or not
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function redirectIfOther()
    {
        return redirect()->route('pihakke3.index');
    }

     /**
     * This check if customer have a register complete or not
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function redirectIfDeveloper()
    {
        return redirect()->route('developer.index');
    }

     /**
     * This check if customer have a register complete or not
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function redirectIfDeveloperSales()
    {
        return redirect()->route('dev-sales.index');
    }

    /**
     * This check if customer have a register complete or not
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function redirectIfCustomer()
    {
        // @note request from client
        // if ( ! $this->profile()['is_simple'] ) {
        //     return redirect()->route('auth.register.simple');
        // }

        // if ( ! $this->profile()['is_completed'] ) {
        //     return redirect()->route('auth.register.complete');
        // }

        return redirect()->route('homepage');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Client::setEndpoint('auth/logout')
            ->setHeaders([
                'Authorization' => session('authenticate.token'),
                'long' => $request['hidden-long'],  
                'lat' =>  $request['hidden-lat'],  
                'auditaction' => 'Logout'
            ])
            ->deleted();
        
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
