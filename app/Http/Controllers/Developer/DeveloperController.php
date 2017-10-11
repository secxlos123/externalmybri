<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) return $this->datatables($request);

        return view( 'developer.developer.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'developer.developer.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
        return view( 'developer.developer.create', $id );
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
        dd($request->all());
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
     * Initial for datatable unit
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $units = Client::setEndpoint('property-item')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            // ->setQuery([
            //     'property_type_id' => $request->input('property_type_id'),
            //     'is_available' => $request->input('is_available'),
            //     'status' => $request->input('status'),
            //     'price' => $request->input('price'),
            //     'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
            //     'search'=> $request->input('search.value'),
            // ])
            ->get();

        foreach ($units['contents']['data'] as $key => $unit) {
            $unit['action'] = view('layouts.actions', [
                'show' => route('developer.developer.show', $unit['id']),
                'edit' => route('developer.developer.edit', $unit['id'])
            ])->render();
            $units['contents']['data'][$key] = $unit;
        }

        $units['contents']['draw'] = $request->input('draw');
        $units['contents']['recordsTotal'] = $units['contents']['total'];
        $units['contents']['recordsFiltered'] = $units['contents']['total'];

        unset(
            $units['contents']['path'],
            $units['contents']['prev_page_url'],
            $units['contents']['next_page_url']
        );
        return response()->json($units['contents']);
    }
}
