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
        $this->middleware('auth.api', ['except' => 'register']);
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
        } else {
            $response = Client::setEndpoint("auth/register-{$request->input('register')}")
                ->setHeaders(['Authorization' => session('authenticate.token')])
                ->setBody($this->setRequest($request->all()))
                ->post('multipart');
        }

        return redirect()->route('homepage');
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
            if ( is_array($value) ) return $this->setRequest($value);
            if ( is_file($value) ) {
                $requests[] = ['name' => $key, 'contents' => fopen($value->getRealPath(), 'r')];
                continue;
            }
            $requests[] = ['name' => $key, 'contents' => $value];
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
     * [actived description]
     * 
     * @param  [type] $userId [description]
     * @param  [type] $code   [description]
     * @return [type]         [description]
     */
    public function actived($userId, $code)
    {
        $response = Client::setBody(['user_id' => $user_id, 'code' => $code])->post();

        if ( in_array($response['code'], [200, 201]) ) {
            return view('auth.actived');
        }

        return redirect()->route('homepage');
    }
}
