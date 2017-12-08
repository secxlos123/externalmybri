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

        $results = \Client::setBase('common')
            ->setQuery(['without_independent' => true])
            ->setEndpoint('developers')->get();

        $developers = collect([]);

        if ($results['code'] == 200) {
            collect($results['contents']['data'])->filter(function ($developer) use (&$developers) {
                return $developers->push( array_only($developer, ['image', 'company_name']) );
            });
        }

        config(['jsvalidation.focus_on_error' => false]);
    	return view('home.index', compact('developers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailProduct()
    {
        return view('product.index');
    }

    public function aboutUs()
    {
        return view('about-us.index');
    }
}
