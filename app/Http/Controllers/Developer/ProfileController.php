<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\Profile\ChangePasswordRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {
        if(!empty($request->get('slug')) && !empty($request->get('type'))  ){
        /*
        * mark read the notification
        */
        Client::setEndpoint('users/notification/read/'.@$request->get('slug').'/'.@$request->get('type'))
               ->setHeaders([
                'Authorization' => session('authenticate.token')
                , 'is_read' => is_read()
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->get();
        }

        $results = Client::setEndpoint('profile')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();
        
        return view('profile.index', [
            'results' => $results['contents'],
            'type' => 'view',
            'active' => $type
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        $results = Client::setEndpoint('profile')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();
        
        return view('profile.index', [
            'results' => $results['contents'],
            'type' => 'edit',
            'active' => $type
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {

        $results = Client::setEndpoint('profile/update')
            ->setHeaders([
                'Authorization' => session('authenticate.token'),
                'long' => $request['hidden-long'],  
                'lat' =>  $request['hidden-lat'],  
                'auditaction' => 'ubah profile bagian data pribadi'
            ])
            ->setBody(array_to_multipart($request->all()))
            ->put('multipart');

        if (isset($results['code']) && $results['code'] == 200) {
            \Session::flash('flash_message', $results['descriptions']);
        }else{
            \Session::flash('error_flash_message', $results['descriptions']);
        }

        return redirect()->route('developer.profile.index', $type);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * This Controller For Redirect when Success or Failed Update Password
    *
    * @return \Illuminate\Http\Response
    */

    public function successChangePassword($type)
    {
        $results = Client::setEndpoint('profile')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();
        return view('profile.index', [
            'results' => $results['contents'],
            'type' => 'view',
            'active' => $type
        ]);
    }

    /**
     * change password with new one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $results = Client::setEndpoint('profile/password')
            ->setHeaders([
                'Authorization' => session('authenticate.token'),
                'long' => $request['hidden-long'],  
                'lat' =>  $request['hidden-lat'],  
                'auditaction' => 'Ubah Password'
            ])
            ->setQuery([
                'old_password' => $request->old_password,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ])
            ->put();

        if (isset($results['code']) && $results['code'] == 200) {
            \Session::flash('flash_message', $results['descriptions']);
            return redirect()->route('developer.profile.index', 'password');
        }
        \Session::flash('error_flash_message', $results['descriptions']);
        return redirect()->back()->withInput();
    }
}
