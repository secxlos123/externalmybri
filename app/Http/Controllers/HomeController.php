<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if ( 'developer' == session('authenticate.role') ) {
            return redirect()->route('developer.index');
        }

        $results = \Client::setBase('common')->setEndpoint('developers')->get();
        $developers = collect([]);

        if ($results['code'] == 200) {
            collect($results['contents']['data'])->filter(function ($developer) use (&$developers) {
                return $developers->push( array_only($developer, ['image', 'company_name']) );
            });
        }

    	return view('home.index', compact('developers'));
    }
}
