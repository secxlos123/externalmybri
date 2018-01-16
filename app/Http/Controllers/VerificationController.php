<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Client::setEndpoint('customer-data/'.$request->get('ref_number').'/'.$request->get('slug') )
                        ->setHeaders([
                            'Authorization' => session('authenticate.token')
                        ])
                        ->get();
        $data_verification = $results['contents'];
                       
        if(!empty($request->get('slug')) && !empty($request->get('type'))  ){
        /*
        * mark read the notification
        */
        Client::setEndpoint('users/notification/read/'.@$request->get('slug').'/'.@$request->get('type'))
               ->setHeaders([
                'Authorization' => session('authenticate.token')
                // , 'auditaction' => 'action name'
                , 'is_read' => is_read()
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->get();
        }

        return view('verification.index',compact('data_verification'));
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
        $results = Client::setEndpoint('verification/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                ])
                ->get();
        \Log::info($results['contents']);
        return view('verification.show', [
            'results' => $results['contents']
            ]);
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
     * Initial for datatable verification
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request, $slug = null)
    {
        $results = Client::setEndpoint('verification')
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                ])
                ->get();

        foreach ($results['contents']['data'] as $key => $type) {
            \Log::info("=================================list eform nasabah===========================");
            \Log::info($type);
            $type['ao_name'] = isset($type['ao']) ? $type['ao'] : '';
            $type['product'] = isset($type['product_type']) ? $type['product_type'] : '';
            $type['action'] = view('layouts.actions', [
                'show' => route('verification.show', $type['id'])
            ])->render();
            $results['contents']['data'][$key] = $type;
        }

        $results['contents']['draw'] = $request->input('draw');
        $results['contents']['recordsTotal'] = $results['contents']['total'];
        $results['contents']['recordsFiltered'] = $results['contents']['total'];

        unset(
            $results['contents']['path'],
            $results['contents']['prev_page_url'],
            $results['contents']['next_page_url']
        );

        return response()->json($results['contents']);
    }
}
