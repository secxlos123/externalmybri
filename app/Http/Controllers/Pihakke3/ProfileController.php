<?php

namespace App\Http\Controllers\Pihakke3;

use Illuminate\Http\Request;
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

    	//return $results;
    	 return view('pihakke3.pihakke3.edit', [
    	 	'results' 	=> $results['contents'],
    	 	'type'		=>	'edit'

    	 	]);
    }
}
