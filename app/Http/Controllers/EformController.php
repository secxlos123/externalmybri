<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Traits\Profileble;
use Client;

class EformController extends Controller
{
    use Profileble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( 'developer' == session('authenticate.role') ) {
            return 'Hallo Developer....';
        }

        return view('eforms.index', $this->customer());
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
     * Update status verification data customer
     *
     * @param  Request  $request
     * @param  string   $token
     * @param  string   $status
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, $token, $status)
    {
        $response = Client::setEndpoint("eform/{$token}/{$status}")->get();

        if ($response['code'] == 200) {
            return redirect()->route('eform.confirmation', $status);
        }

        abort(404, 'Halaman tidak ditemukan.');
    }

    /**
     * Show page confirmation for customer if
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmation()
    {
        return view('eforms.confirmation', [
            'status' => request()->get('status', 'reject')
        ]);
    }
}
