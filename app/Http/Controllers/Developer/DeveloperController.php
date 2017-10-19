<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

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
        $client = Client::setEndpoint('developer-agent')
           ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
           ->setBody($request->all())
           ->post();
        // dd($client);
        return redirect()->route('developer.developer-agent.index');
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
        $client = Client::setEndpoint('developer-agent/'.$id)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setBody($request->all())
            ->put();
        // dd($client);
        return redirect()->route('developer.developer-agent.index');
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
        $dev = Client::setEndpoint('developer-agent')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'search'=> $request->input('search.value')
            ])
            ->get();

        foreach ($dev['contents']['data'] as $key => $value) {
            $value['action'] = view('layouts.actions', [
                'show' => route('developer.developer-agent.show', $value['id']),
                'edit' => route('developer.developer-agent.edit', $value['id'])
            ])->render();
            $dev['contents']['data'][$key] = $value;
        }

        $dev['contents']['draw'] = $request->input('draw');
        $dev['contents']['recordsTotal'] = $dev['contents']['total'];
        $dev['contents']['recordsFiltered'] = $dev['contents']['total'];

        unset(
            $dev['contents']['path'],
            $dev['contents']['prev_page_url'],
            $dev['contents']['next_page_url']
        );
        return response()->json($dev['contents']);
    }
}
