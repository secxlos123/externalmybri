<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Traits\Profileble;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\User;
use Client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, Profileble;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.api', ['except' => ['register', 'activated', 'activate', 'successed'] ]);
    }

    /**
     * Show the application registration form simple.
     *
     * @return \Illuminate\Http\Response
     */
    public function simple()
    {
        return $this->form('auth.register-simple');
    }

    /**
     * Show the application registration form complete.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        return $this->form('auth.register-complete');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        if ( 'register' == $request->input('register') ) {
            $response = Client::setEndpoint('auth/register')
                ->setBody( $request->only( ['email', 'password'] ) )
                ->post();
            $route = 'auth.successed';
        } else {
            $response = Client::setEndpoint("auth/register-{$request->input('register')}")
                ->setHeaders(['Authorization' => session('authenticate.token')])
                ->setBody($this->setRequest($request->all()))
                ->post('multipart');
            $route = 'homepage';
        }

        return redirect()->route($route);
    }

    /**
     * Handle for mapping request
     *
     * @param array $data
     */
    public function setRequest(array $data)
    {
        $requests = [];

        foreach ($data as $key => $value) {
            if ( is_array($value) ) {
                foreach ($value as $otherKey => $otherValue) {
                    if ( ! is_array($otherValue) ) {
                        $requests[] = ['name' => $otherKey, 'contents' => $otherValue];
                    }
                    if ( is_file($otherValue) ) {
                        $requests[] = ['name' => $otherKey, 'contents' => fopen($otherValue->getRealPath(), 'r')];
                        continue;
                    }
                }
            }else{
                if ( is_file($value) ) {
                    $requests[] = ['name' => $key, 'contents' => fopen($value->getRealPath(), 'r')];
                    continue;
                }
                $requests[] = ['name' => $key, 'contents' => $value];
            }
        }

        return $requests;
    }

    /**
     * Get form register
     *
     * @param  string $form
     * @return \Illuminate\Http\Response
     */
    public function form($form)
    {
        return view( $form, $this->customer() );
    }

    /**
     * Activate user
     *
     * @param  string $userId
     * @param  string $code
     * @return \Illuminate\Http\Response
     */
    public function activate($userId, $code)
    {
        $response = Client::setEndpoint('activate')->setBody(['user_id' => $userId, 'code' => $code])->post();

        if ( in_array($response['code'], [200, 201]) ) {
            return redirect()->route('auth.activated');
        }

        return redirect()->route('homepage');
    }

    /**
     * Show view after activated
     *
     * @return \Illuminate\Http\Response
     */
    public function activated()
    {
        return view('auth.actived');
    }

    /**
     * Show view after success
     *
     * @return \Illuminate\Http\Response
     */
    public function successed()
    {
        return view('auth.success-register');
    }
}
