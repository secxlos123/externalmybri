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
        $this->middleware('auth.api', ['except' => ['register', 'activated', 'activate', 'successed', 'resendEmail'] ]);
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
            $splitName = explode(' ', $request->input('fullname'), 2);
            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : '';
            $request->merge(compact('first_name', 'last_name'));

            $response = Client::setEndpoint('auth/register')
                ->setHeaders([
                             'long' => $request['hidden-long'],
                             'lat' =>  $request['hidden-lat'],
                             'auditaction' => 'Registrasi Nasabah',
                    ]
                )
                ->setBody( $request->only( ['email', 'password', 'first_name', 'last_name','mobile_phone'] ) )
                ->post();

            \Session::put('uid', $response['contents']['user_id']);

            if ($response['code'] == 422) {
                $message = '';
                foreach ($response['contents'] as $key => $value) {
                    $message .= $value.'<br/>';
                }
                \Session::flash('flash_message',$message);
                return redirect()->back()->withInput();
            }
            \Session::flash('success_flash_message', 'success');
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
            \Session::flash('access_flash_200', 'success');
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
        if (\Session::has('access_flash_200')) {
            return view('auth.actived');
        }else{
            return redirect()->route('homepage');
        }
    }

    /**
     * Show view after success
     *
     * @return \Illuminate\Http\Response
     */
    public function successed()
    {
        if (\Session::has('success_flash_message')) {
            return view('auth.success-register');
        }else{
            return redirect()->route('homepage');
        }
    }

    /**
     * Show view after success
     *
     * @return \Illuminate\Http\Response
     */
    public function resendEmail()
    {
        $uid = \Session::get('uid');
        $response = Client::setEndpoint('auth/register')
                ->setQuery([
                    'uid' => $uid
                    ])
                ->post();
        if ($response['code'] == 422) {
            $message = '';
            foreach ($response['contents'] as $key => $value) {
                $message .= $value.'<br/>';
            }
            \Session::flash('flash_message',$message);
            return redirect()->back();
        }
        \Session::flash('success_flash_message', 'success');
        return redirect()->route('auth.successed');
    }
}
