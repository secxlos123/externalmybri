<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Client::setBase('common')->setEndpoint('nearby-properties')
            ->setQuery([
                'lat' => $request->input('lat'),
                'long' => $request->input('long'),
            ])
            ->get();

        return response()->json(
            view('home._content-galery', [ 'properties' => $properties['contents'] ])->render()
        );
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function listProperty(Request $request)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property')
            ->setQuery([
                'limit' => $request->input('limit'),
                'page' => ($request->input('page')) ? $request->input('page') : 1,
                'prop_city_id' => ($request->input('prop_city_id')) ? $request->input('prop_city_id') : null,
                'dev_id' => ($request->input('dev_id')) ? $request->input('dev_id') : null
            ])
            ->get();

        \Log::info($results);
        // return view('home.property.index', compact('results'));
        return response()->json(
            view('home.property._content-property', [ 'results' => $results['contents'] ])->render()
        );
    }

    public function pageProperty()
    {
        $results = Client::setBase('common')
            ->setEndpoint('property')
            ->setQuery([
                'limit' => 6,
                'page' => 1
            ])
            ->get();

        $results = $results['contents'];
        return view('home.property.index', compact('results'));
    }
}
