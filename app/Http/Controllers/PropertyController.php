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
            view('property._list-property', [ 'results' => $properties['contents'] ])->render()
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
                'dev_id' => ($request->input('dev_id')) ? $request->input('dev_id') : null,
                'without_independent' => true,
                'long' => ($request->input('long')) ? $request->input('long') : null,
                'lat' => ($request->input('lat')) ? $request->input('lat') : null
            ])
            ->get();

        return response()->json(
            view('property._content-property', [ 'results' => $results['contents'] ])->render()
        );
    }

    public function pageProperty()
    {
        return view('property.index');
    }

    public function getLocation()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://freegeoip.net/json');
        $location = json_decode( $res->getBody()->getContents() );
        return $location;
    }

    public function detailProperty($slug)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property/'.$slug)
            ->get();
        // dd($results);
        // $property = $results['contents'];
        // return view('property.show', compact('property'));
        return view("developer.property.show", [
            'property' => (object) $results['contents'],
            'role' => 'customer'
        ]);
    }

    public function getPropertyType(Request $request)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property-type')
            ->setQuery([
                'property_id' => $request->property_id,
                'limit' => $request->limit,
                'page' => $request->page
                ])
            ->get();
        // dd($results);
        return response()->json(
            view('property._property-type-detail-section', [ 'results' => $results['contents'] ])->render()
        );
    }

    public function detailPropertyType($slug)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property-type/'.$slug)
            ->get();
        // dd($results);
        return view("developer.property_type.show", [
            'type' => (object) $results['contents'],
            'role' => 'customer'
        ]);
    }

    public function getDetailPropertyType(Request $request)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property-item')
            ->setQuery([
                'property_type_id' => $request->property_type_id,
                'limit' => $request->limit,
                'page' => $request->page
                ])
            ->get();
        // dd($results);
        return response()->json(
            view('property-type._property-unit-detail-section', [ 'results' => $results['contents'] ])->render()
        );
    }

    public function detailPropertyUnit($slug)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property-item/'.$slug)
            ->get();
        // dd($results);
        return view("developer.property_item.show", [
            'unit' => (object) $results['contents'],
            'role' => 'customer'
        ]);
    }
}
