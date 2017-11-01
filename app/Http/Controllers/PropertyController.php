<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;

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

    /**
     * Get list of property for from API
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'lat' => ($request->input('lat')) ? $request->input('lat') : null,
                'price' => ($request->input('price')) ? $request->input('price') : null,
                'category' => ($request->input('category')) ? $request->input('category') : null,
                'bedroom' => ($request->input('bedroom')) ? $request->input('bedroom') : null,
                'bathroom' => ($request->input('bathroom')) ? $request->input('bathroom') : null,
                'carport' => ($request->input('carport')) ? $request->input('carport') : null,
                'surface_area' => ($request->input('land')) ? $request->input('land') : null,
                'building_area' => ($request->input('building')) ? $request->input('building') : null,
                'prop_type' => ($request->input('prop_type')) ? $request->input('prop_type') : null
            ])
            ->get();

        return response()->json(
            view('property._content-property', [ 'results' => $results['contents'] ])->render()
        );
    }

    /**
     * Display a listing of the property.
     *
     * @return \Illuminate\Http\Response
     */
    public function pageProperty()
    {
        return view('property.index');
    }

    /**
     * Display a detail page of property.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function detailProperty($slug)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property/'.$slug)
            ->get();

        return view("developer.property.show", [
            'property' => (object) $results['contents'],
            'role' => 'customer'
        ]);
    }

    /**
     * Get and display list of property type from API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return response()->json(
            view('property._property-type-detail-section', [ 'results' => $results['contents'] ])->render()
        );
    }

    /**
     * Get and display a detail page of property type.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function detailPropertyType($slug)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property-type/'.$slug)
            ->get();

        return view("developer.property_type.show", [
            'type' => (object) $results['contents'],
            'role' => 'customer'
        ]);
    }

    /**
     * Get and display list of property unit from API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return response()->json(
            view('property-type._property-unit-detail-section', [ 'results' => $results['contents'] ])->render()
        );
    }

    /**
     * Get and display detail of property unit from API.
     *
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function detailPropertyUnit($slug)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property-item/'.$slug)
            ->get();

        $unit = (object) $results['contents'];
        $action = '?property_id='.$unit->property_id.'&property_name='.$unit->property_name.'&property_type_id='.$unit->property_type_id.'&property_type_name='.$unit->property_type_name.'&property_item_id='.$unit->id.'&developer_id='.$unit->developer_id.'&developer_name='.$unit->developer_name;

        return view("developer.property_item.show", [
            'unit' => (object) $results['contents'],
            'role' => 'customer',
            'action' => $action
        ]);
    }
}
