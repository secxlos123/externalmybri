<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\PropertyItem\CreateRequest;
use App\Http\Requests\Developer\PropertyItem\UpdateRequest;
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
        return $this->item($id, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->item($id, 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        return $this->storeOrUpdate($request, 'property-item/'.$id, 'put');
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
     * Get property item from API
     *
     * @param  string $id
     * @param  string $view
     * @return \Illuminate\Http\Response
     */
    public function item($id, $view)
    {
        $unit = Client::setEndpoint("property-item/{$id}")
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->get();
        if ($view == "edit") {
            if (isset($unit['contents']['available_status'])) {
                if (in_array($unit['contents']['available_status'], ['booked', 'sold'])) {
                    \Session::flash('error_flash_message', 'Properti tidak dapat diubah.');
                    return redirect()->route('developer.proyek-item.index');
                }
            }else{
                \Session::flash('error_flash_message', 'Tidak dapat menemukan status properti.');
                return redirect()->route('developer.proyek-item.index');
            }
        }

        return view("developer.property_item.{$view}", [
            'unit' => (object) $unit['contents'],
            'role' => 'developer',
            'view' => $view
        ]);
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
                'limit'            => $request->input('length'),
                'property_type_id' => $request->input('property_type_id'),
                'is_available'     => $request->input('is_available'),
                'status'           => $request->input('status'),
                'price'            => $request->input('price'),
                'sort'             => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'page'             => (int) $request->input('page') + 1,
                'search'           => $request->input('search.value'),
                'property_id'      => $request->input('property_id'),
            ])
            ->get();

        foreach ($units['contents']['data'] as $key => $unit) {
            $unit['is_available']  = $unit['is_available'] ? 'Avaliable' : 'Not Avaliable';
            $unit['prop_status']  = $unit['prop_status'] ? ucfirst($unit['prop_status']) : 'Not known';
            $unit['status'] = $unit['status'] == 'new' ? 'Baru' : 'Bekas';
            $unit['price']  = 'Rp. ' . number_format($unit['price'], 0, ',', '.');
            $unit['action'] = view('layouts.actions', [
                'show' => route('developer.proyek-item.show', $unit['id']),
                //'edit' => route('developer.proyek-item.edit', $unit['id']),
                'edit_unit' => route('developer.proyek-item.edit', $unit['id']),
                'is_approve_unit' => $unit['is_approved'],
                'available_status_unit' => $unit['available_status'],
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
     * Handling for create and update property item
     *
     * @param  Request $request
     * @param  string  $endpoint
     * @param  string  $method
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request, $endpoint, $method)
    {
        //dd($request->all());
        $dir = "tmp/{$request->get('_token')}";
        extract_dir_to_request($request, $dir, 'property-item');
        if($method=='put'){
            $auditaction= 'edit unit property';
        }else if ($method == 'post'){
            $auditaction= 'tambah unit property';
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

                // dd($response);
                
        if ( ! in_array($response['code'], [200, 201]) ) {
            \Session::flash('flash_message', $response['descriptions']);
            Storage::disk('property-item')->deleteDirectory($dir);
            return redirect()->back()->withInput()->withError($response['descriptions']);
        }
        if (isset($response['code']) && $response['code'] == 200 || isset($response['code']) && $response['code'] == 201 ){
            \Session::flash('flash_message', $response['descriptions']);
            return redirect()->route('developer.proyek-item.index');
        }else{
            return redirect()->route('developer.proyek-item.index');
        }
    }

}
