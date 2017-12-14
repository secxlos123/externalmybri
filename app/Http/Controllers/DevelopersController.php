<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list-developer.index');
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
     * Display a listing of all developer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListDeveloper(Request $request)
    {
        $results = Client::setBase('common')->setEndpoint('developers')
            ->setHeaders( [ 'Authorization' => session('authenticate.token') ] )
            ->setQuery([
                'page' => ($request->input('page')) ? $request->input('page') : 1,
                'without_independent' => false
                ])
            ->get();

        return response()->json(
            view('list-developer._content-developer', [ 'results' => $results['contents'], 'id' => 'dev' ])->render()
        );
    }

    /**
     * Display a listing property of developer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listPropertyDeveloper($id)
    {
        return view('list-developer.index', compact('id'));
    }

    /**
     * Display a listing property of developer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListPropertyDeveloper(Request $request)
    {
        $results = Client::setBase('common')
            ->setEndpoint('property')
            ->setQuery([
                'limit' => $request->input('limit'),
                'page' => ($request->input('page')) ? $request->input('page') : 1,
                'dev_id' => ($request->input('dev_id')) ? $request->input('dev_id') : null
            ])
            ->get();

        return response()->json(
            view('list-developer._content-developer', [
                'results' => $results['contents'],
                'id' => 'prop_dev',
                'dev_id' => ($request->input('dev_id')) ? $request->input('dev_id') : null
                ])->render()
        );
    }
}
