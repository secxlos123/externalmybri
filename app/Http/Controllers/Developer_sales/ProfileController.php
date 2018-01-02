<?php

namespace App\Http\Controllers\Developer_sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\Agent\BaseRequest;
use App\Http\Requests\Developer\Agent\CreateRequest;
use App\Http\Requests\Developer\Agent\UpdateRequest;
use App\Http\Requests\Developer\Profile\ChangePasswordRequest;
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
         return view('developer.developer_sales.edit', [
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
              //  dd($results);
        config(['jsvalidation.focus_on_error' => true]);
    	 return view('developer.developer_sales.edit', [
    	 	'results' 	=> $results['contents'],
    	 	'type'		=>	'edit'

    	 	]);
    }

    /**
    * This function for request update data to Admin
    * @param  \Illuminate\Http\Request  $request
    */

    public function update(Request $request, $id)
    {
        $input  = $request->all();
        $client = Client::setEndpoint('developer-agent/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token'),
                    'long'          => $request['hidden-long'],  
                    'lat'           => $request['hidden-lat'],
                    'auditaction'   => $request['auditaction']
                    ])
                ->setBody($input)
                ->put();
        if (isset($client['code']) && $client['code'] == 201) {
            \Session::flash('flash_message', $client['descriptions']);
            return redirect()->route('dev-sales.profile.edit');
        }else{
            \Session::flash('error_flash_message', $client['descriptions']);
        }
        return redirect()->route('dev-sales.profile.index');
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
        return view('developer.developer_sales.success_edit', [
            'results' => $results['contents'],
            'type' => 'view',
            'active' => 'password'
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
                'long'          => $request['hidden-long'],  
                'lat'           => $request['hidden-lat'],
                'auditaction'   => $request['auditaction']
            ])
            ->setQuery([
                'old_password' => $request->old_password,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ])
            ->put();

        if (isset($results['code']) && $results['code'] == 200) {
            \Session::flash('flash_message', $results['descriptions']);
            return redirect()->route('dev-sales.profile.index-password');
        }
        \Session::flash('error_flash_message', $results['descriptions']);
        return redirect()->route('dev-sales.profile.index-password')->withInput();
    }
}
