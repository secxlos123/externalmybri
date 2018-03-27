<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\PropertyType\CreateRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use Storage;
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
        'items'
    ];

    /**
     * Avaliable columns datatables
     *
     * @var array
     */
    protected $columnss = [
        'property_type_id',
        'no_item',
        'address',
        'price',
        'is_available',
        'prop_status',
        'available_status',
        'status',
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
        return view( 'developer.property_type.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        return $this->storeOrUpdate($request, 'property-type', 'post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        if ( $request->ajax() ) {
            return $this->datatables_unit($request, $slug);
        }

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
        return $this->type($slug, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $slug)
    {
        return $this->storeOrUpdate($request, "property-type/{$slug}", 'put');
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
        $endpoint = $slug ? "property-type/{$slug}/property-item" : 'property-type';
        $sort = $request->input('order.0');
        $types = Client::setEndpoint($endpoint)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'limit'     => $request->input('length'),
                'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'property_id' => $request->input('property_id'),
                'surface_area' => $request->input('surface_area'),
                'building_area'=> $request->input('building_area'),
                'proyek_type'  => $request->input('proyek_type'),
                'certificate'  => $request->input('certificate'),
                'page'      => (int) $request->input('page') + 1,
                'search'=> $request->input('search.value'),
            ])
            ->get();

        foreach ($types['contents']['data'] as $key => $type) {
            $type['action'] = view('layouts.actions', [
                'show' => route('developer.proyek-type.show', $type['slug']),
                'edit' => route('developer.proyek-type.edit', $type['slug']),
                'is_approve' => $type['is_approved']
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
            'type' => (object) $type['contents'],
            'role' => 'developer'
        ]);
    }

    /**
     * Handling for create and update property type
     *
     * @param  Request $request
     * @param  string  $endpoint
     * @param  string  $method
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request, $endpoint, $method)
    {
        $dir = "tmp/{$request->get('_token')}";
        extract_dir_to_request($request, $dir, 'property_types');

        if($method=='put'){
            $auditaction= 'edit tipe property';
        }else if ($method == 'post'){
            $auditaction= 'tambah tipe property';
        }

        $headers= [
            'Authorization' => session('authenticate.token'),
            'long' => $request['hidden-long'],
            'lat' =>  $request['hidden-lat'],
            'auditaction' => $auditaction
          ];

        $response = Client::setEndpoint($endpoint)
                ->setHeaders($headers)
                ->setBody(array_to_multipart($request->all()))
                ->{$method}('multipart');

        if ( ! in_array($response['code'], [200, 201]) ) {
            Storage::disk('property_types')->deleteDirectory($dir);
            \Session::flash('error_flash_message', $response['descriptions']);
            return redirect()->back()->withInput()->withError($response['descriptions']);
        }
            \Session::flash('flash_message', $response['descriptions']);
            return redirect()->route('developer.proyek-type.index');
    }

     public function datatables_unit(Request $request, $slug)
    {

        $sort = $request->input('order.0');
        $types = Client::setEndpoint("property-type/{$slug}/property-item")
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'limit'            => $request->input('length'),
                'property_type_id' => $request->input('property_type_id'),
                'is_available'     => $request->input('is_available'),
                'status'           => $request->input('status'),
                'price'            => $request->input('price'),
                'sort'             => $this->columnss[$sort['column']] .'|'. $sort['dir'],
                'page'             => (int) $request->input('page') + 1,
                'search'           => $request->input('search.value'),
            ])
            ->get();

        foreach ($types['contents']['data'] as $key => $type) {
            $type['action'] = view('layouts.actions', [
                'show' => route('developer.proyek-item.show', $type['id']),
                'edit' => route('developer.proyek-item.edit', $type['id'])
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
     * Initial for datatable property type
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables_view_type(Request $request)
    {
        $sort = $request->input('order.0');
        $types = Client::setEndpoint('property-type')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'limit'     => $request->input('length'),
                'property_id' => $request->input('property_id'),
                'surface_area' => $request->input('surface_area'),
                'building_area'=> $request->input('building_area'),
                'proyek_type'  => $request->input('proyek_type'),
                'certificate'  => $request->input('certificate'),
                'page'      => (int) $request->input('page') + 1,
                'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'search'=> $request->input('search.value'),
            ])
            ->get();

        foreach ($types['contents']['data'] as $key => $type) {
            $type['action'] = view('layouts.actions', [
                'show' => route('developer.proyek-type.show', $type['slug']),
                'edit' => route('developer.proyek-type.edit', $type['slug']),
                'is_approve' => $type['is_approved']
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
}
