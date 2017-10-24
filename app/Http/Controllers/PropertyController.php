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
        // $location = $this->getLocation();
        $properties = Client::setBase('common')->setEndpoint('nearby-properties')
            ->setQuery([
                'lat' => $request->input('lat'),
                'long' => $request->input('long'),
            ])
            ->get();
        // return $properties;
        return response()->json(
            view('property._content-property', [ 'results' => $properties['contents'] ])->render()
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
        $location = $this->getLocation();
        $results = Client::setBase('common')
            ->setEndpoint('property')
            ->setQuery([
                'limit' => $request->input('limit'),
                'page' => ($request->input('page')) ? $request->input('page') : 1,
                'prop_city_id' => ($request->input('prop_city_id')) ? $request->input('prop_city_id') : null,
                'dev_id' => ($request->input('dev_id')) ? $request->input('dev_id') : null,
                'without_independent' => true,
                'long' => $location->longitude,
                'lat' => $location->latitude
            ])
            ->get();

        return response()->json(
            view('property._content-property', [ 'results' => $results['contents'] ])->render()
        );
    }

    public function pageProperty()
    {
        $location = $this->getLocation();
        $results = Client::setBase('common')
            ->setEndpoint('property')
            ->setQuery([
                'limit' => 6,
                'page' => 1,
                'without_independent' => true,
                'long' => $location->longitude,
                'lat' => $location->latitude
            ])
            ->get();

        $results = $results['contents'];
        return view('property.index', compact('results'));
    }

    public function getLocation()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://freegeoip.net/json');
        $location = json_decode( $res->getBody()->getContents() );
        return $location;
    }
}
