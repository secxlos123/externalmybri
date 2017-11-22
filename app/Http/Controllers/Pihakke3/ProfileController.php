<?php

namespace App\Http\Controllers\Pihakke3;

use Illuminate\Http\Request;
use App\Http\Requests\Pihakke3\Profile\BaseRequest;
use App\Http\Requests\Pihakke3\Profile\CreateRequest;
use App\Http\Requests\Pihakke3\Profile\UpdateRequest;
use App\Http\Requests\Developer\Profile\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use Client;

class ProfileController extends Controller
{
     /**
    * Display a detail profile
    *
    * @return \Illuminate\Http\Response
    */

public function index()
    {
        $results = Client::setEndpoint('profile')
                ->setHeaders(['Authorization' => session('authenticate.token')])->get();

        //return $results;
         return view('pihakke3.pihakke3.edit', [
            'results'   => $results['contents'],
            'type'      =>  'view'

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit()
    {
    	$results = Client::setEndpoint('profile')
    			->setHeaders(['Authorization' => session('authenticate.token')])->get();
        $city    = Client::setEndpoint('city/')->get(); 
        config(['jsvalidation.focus_on_error' => true]);
    	 return view('pihakke3.pihakke3.edit', [
    	 	'results' 	=> $results['contents'],
            'city'      => $city['contents'],
    	 	'type'		=>	'edit'

    	 	]);
    }

    /**
    * This function for request update data to Admin
    * @param  \Illuminate\Http\Request  $request
    */

    public function requpdate(Request $request)
    {
        $input  = $request->all();
        $client = Client::setEndpoint('profile/update/')
                ->setHeaders(['Authorization' => session('authenticate.token')])
                ->setBody($input)
                ->put();
        if (isset($client['code']) && $client['code'] == 200) {
            \Session::flash('flash_message', $client['descriptions']);
        }else{
            \Session::flash('error_flash_message', $client['descriptions']);
        }
        return redirect()->route('pihakke3.profile.edit');
    }

    /**
    * This function for List View All City
    *
    */

    public function getCity()
    {
        $results = Client::setEndpoint('cities')
                ->get();
        return $results['contents']['data'];
        // return view('pihakke3.pihakke3.edit', [
        //     'results' => $results['contents']

        //     ]);
    }

    /**
    * This Controller For Redirect when Success or Failed Update Password
    *
    * @return \Illuminate\Http\Response
    */

    public function successChangePassword()
    {
        $results = Client::setEndpoint('profile')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();
        $city    = Client::setEndpoint('city/')->get(); 
        return view('pihakke3.pihakke3.success_edit', [
            'results' => $results['contents'],
            'city'      => $city['contents'],
            'type' => 'view'
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $results = Client::setEndpoint('profile/password')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'old_password' => $request->old_password,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ])
            ->put();

        if (isset($results['code']) && $results['code'] == 200) {
            \Session::flash('flash_message', $results['descriptions']);
            return redirect()->route('pihakke3.profile.index-password');
        }
        \Session::flash('error_flash_message', $results['descriptions']);
        return redirect()->route('pihakke3.profile.index-password')->withInput();
    }
}
