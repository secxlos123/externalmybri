<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\PropertyItem\CreateRequest;
use Client;
use Storage;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    /**
     * Avaliable columns datatables
     *
     * @var array
     */
    protected $columns = [
        'property_type_id',
        'address',
        'price',
        'is_available',
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

        return view( 'developer.property_item.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'developer.property_item.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        return $this->storeOrUpdate($request, 'property-item', 'post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Client::setEndpoint("property-item/".$id)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->get();
        $property = $property['contents'];
        // dd($property);

        return view("developer.property_item.show", compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Client::setEndpoint("property-item/".$id)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->get();
        $property = $property['contents'];
        // dd($property);

        return view("developer.property_item.edit", compact(['property', 'id']));
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
        return $this->storeOrUpdate($request, 'property-item/'.$id, 'post');
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
            ->setQuery([
                'property_type_id' => $request->input('property_type_id'),
                'is_available' => $request->input('is_available'),
                'status' => $request->input('status'),
                'price' => $request->input('price'),
                'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'search'=> $request->input('search.value'),
            ])
            ->get();

        foreach ($units['contents']['data'] as $key => $unit) {
            $unit['action'] = view('layouts.actions', [
                'show' => route('developer.proyek-item.show', $unit['id']),
                'edit' => route('developer.proyek-item.edit', $unit['id'])
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

    /**
     * [setMultipart description]
     *
     * @param array  $inputs [description]
     * @param string $parent [description]
     */
    public function setMultipart( array $inputs = [], $parent = '')
    {
        $results = [];
        foreach ($inputs as $name => $value) {
            if ( is_array($value) ) {
                return $this->setMultipart($value, $name);
            } elseif ( is_file($value) ) {
                $results[] = ['name' => $parent ? "{$parent}[{$name}]" : $name, 'contents' => fopen($value->getRealPath(), 'r') ];
            } elseif ( in_array($name, ['description', 'facilities']) ) {
                $results[] = ['name' => $parent ? "{$parent}[{$name}]" : $name, 'contents' => htmlspecialchars($value) ];
            } else {
                $results[] = ['name' => $parent ? "{$parent}[{$name}]" : $name, 'contents' => $value];
            }
        }
        return $results;
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
        extract_dir_to_request($request, $dir, 'property-item');

        $response = Client::setEndpoint($endpoint)
                ->setHeaders(['Authorization' => session('authenticate.token')])
                ->setBody(array_to_multipart($request->all()))
                ->{$method}('multipart');
        // dd($response);
        if ( ! in_array($response['code'], [200, 201]) ) {
            Storage::disk('property-item')->deleteDirectory($dir);
            return redirect()->back()->withInput()->withError($response['descriptions']);
        }

        return redirect()->route('developer.proyek-item.index');
    }
}
