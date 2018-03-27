<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) return $this->datatables($request);

        return view('tracking.index');
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
        $result = Client::setEndpoint('tracking/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                ])->get();
        

        return view('tracking.show', [
            'results' => $result['contents']
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
     * Initial for datatable tracking
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request, $slug = null)
    {
        $results = Client::setEndpoint('tracking')
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                ])
                ->get();
       

        foreach ($results['contents']['data'] as $key => $type) {
            $type['action'] = view('layouts.actions', [
                'show' => route('tracking.show', 1)
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
