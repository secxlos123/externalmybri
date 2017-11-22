<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get('https://private-694ba-mybri.apiary-mock.com/api/v1/eks/tracking?kota=kota&developer=developer&status=status');
        // dd(json_decode($res->getBody()));
        $types = json_decode($res->getBody())->contents->data;
        // if ( $request->ajax() ) return $this->datatables($request);

        return view('tracking.index', compact('types'));
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
        $client = new \GuzzleHttp\Client();
        $res = $client->get('https://private-694ba-mybri.apiary-mock.com/api/v1/eks/tracking/'.$id);
        // dd(json_decode($res->getBody())->contents);
        return view('tracking.show', [
            'results' => json_decode($res->getBody())->contents
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
     * Initial for datatable property type
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request, $slug = null)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get('https://private-694ba-mybri.apiary-mock.com/api/v1/eks/tracking?kota=kota&developer=developer&status=status');
        // dd(json_decode($res->getBody()));
        $types = json_decode($res->getBody());

        foreach ($types->contents->data as $key => $type) {
            $type['action'] = view('layouts.actions', [
                'show' => route('tracking.show', 1)
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
