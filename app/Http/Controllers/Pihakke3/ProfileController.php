<?php

namespace App\Http\Controllers\Pihakke3;

use Illuminate\Http\Request;
use App\Http\Requests\Pihakke3\Profile\BaseRequest;
use App\Http\Requests\Pihakke3\Profile\CreateRequest;
use App\Http\Requests\Pihakke3\Profile\UpdateRequest;
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

    public function getCity($type = null)
    {
        $results = Client::setEndpoint('cities')
                ->get();
        return $results['contents']['data'];
        // return view('pihakke3.pihakke3.edit', [
        //     'results' => $results['contents']

        //     ]);
    }
}
