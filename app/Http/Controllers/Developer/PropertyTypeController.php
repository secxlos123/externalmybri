<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class PropertyTypeController extends Controller
{
    /**
     * Avaliable columns items datatables
     * 
     * @var array
     */
    protected $columns = [
        'name',
        'building_area',
        'surface_area',
        'certificate',
        'items',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) return $this->datatables($request);

        return view( 'developer.property_type.index' );
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
    public function show($slug)
    {
        return $this->type($slug, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
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
     * Initial for datatable property type
     * 
     * @param  Request $request 
     * @return \Illuminate\Http\Response         
     */
    public function datatables(Request $request, $slug = null)
    {
        $endpoint = $slug ? "property/{$slug}/property-type" : 'property-type';
        $sort = $request->input('order.0');
        $types = Client::setEndpoint($endpoint)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'page'  => $request->input('page'),
                'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'search'=> $request->input('search.value'),
            ])
            ->get();

        foreach ($types['contents']['data'] as $key => $type) {
            $type['action'] = view('layouts.actions', [
                'show' => route('developer.proyek-type.show', $type['slug']),
                // 'edit' => route('developer.proyek-type.edit', $type['slug'])
            ])->render();
            $types['contents']['data'][$key] = $type;
        }

        $types['contents']['draw'] = $request->input('draw');
        $types['contents']['recordsTotal'] = $types['contents']['total'];
        $types['contents']['recordsFiltered'] = $types['contents']['total'];
        
        unset(
            $types['contents']['path'],
            $types['contents']['prev_page_url'],
            $types['contents']['next_page_url']
        );

        return response()->json($types['contents']);
    }

    /**
     * Get property type from API
     * 
     * @param  string $slug
     * @param  string $view
     * @return \Illuminate\Http\Response
     */
    public function type($slug, $view)
    {
        $type = Client::setEndpoint("property-type/{$slug}")
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->get();

        return view("developer.property_type.{$view}", [
            'type' => (object) $type['contents']
        ]);
    }
}
