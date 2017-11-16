<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scheduling.index');
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
    public function show()
    {
        // $client = new \GuzzleHttp\Client();
        // $res = $client->get('https://private-694ba-mybri.apiary-mock.com/api/v1/eks/schedule/'.$id);
        // dd(json_decode($res->getBody()));
        // echo $res->getStatusCode();
        // echo $res->getBody();
        // json_decode($res->getBody()));
        // return response()->json($results);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $results = Client::setEndpoint('schedule/'.$request->id)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setBody($request->except('id'))
            ->put();

        return response()->json($results);
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
     * Get list schedule from API
     * @return \Illuminate\Http\Response
     */
    public function listData()
    {
        $results = Client::setEndpoint('schedule')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();

        return response()->json($results['contents']);
    }

}
