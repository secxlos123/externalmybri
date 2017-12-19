<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Requests\Developer\Agent\BaseRequest;
use App\Http\Requests\Developer\Agent\CreateRequest;
use App\Http\Requests\Developer\Agent\UpdateRequest;
use App\Http\Controllers\Controller;
use Client;
use Carbon\Carbon;

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
        //   $data = Client::setEndpoint('developer-agent')->setHeaders(['Authorization' => session('authenticate.token')])->get();
        // return view( 'developer.developer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        config(['jsvalidation.focus_on_error' => true]);
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
        $input = [
            "name" => $request->input("name"),
            "birth_date" => Carbon::parse($request->input("birth_date"))->format('Y-m-d'),
            "join_date" => Carbon::parse($request->input("join_date"))->format('Y-m-d'),
            "mobile_phone"  => $request->input("mobile_phone"),
            "email" => $request->input("email")
                ];
        $client = Client::setEndpoint('developer-agent')
           ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
           ->setBody($input)
           ->post();
        // dd($client);
        return redirect()->route('developer.developer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Client::setEndpoint('developer-agent/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                    ])   
                ->get();
        return view('developer.developer.edit', compact('data'));
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
        $input = $request->all();
        $client = Client::setEndpoint('developer-agent/'.$id)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setBody($input)
            ->put();
       
        return redirect()->route('developer.developer.index');
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
                'limit'     => $request->input('length'),
                'search'    => $request->input('search.value'),
                'page'      => ( int ) $request->input('page') + 1
            ])
            ->get();

        foreach ($dev['contents']['data'] as $key => $value) {
            $value['action'] = view('layouts.actions-agent-dev', [
                'show'    => route('developer.developer.show', $value['user_id']),
                'edit'    => route('developer.developer.show', $value['user_id']),
                'banned'  => route('developer.developer.deactive', $value['user_id']),
                'is_banned'=> $value['is_banned'],
                'user_id'   => $value['user_id']
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
    /**
     * This Function for Deactive and Active user login
     * @return \Illuminate\Http\Response
     */
     public function deactive(Request $request, $id)
     { 
        $input  = $request->all();
        $client = Client::setEndpoint('developer-agent/banned/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                    ])
               // ->setBody($input)
                ->get();
                
                 if (isset($client['code']) && $client['code'] == 200) {
                \Session::flash('flash_message', $client['descriptions']);

                return redirect()->route('developer.developer.index');
            }

     }
}
