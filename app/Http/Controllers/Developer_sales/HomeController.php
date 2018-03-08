<?php

namespace App\Http\Controllers\Developer_sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class HomeController extends Controller
{

	/**
     * Avaliable columns pengajuan datatables
     *
     * @var array
     */
    protected $columns = [
        'ref_number',
        'nik',
        'nominal',
        'status',
        'product_type',
        'ao_name',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('developer.home_dev_sales.index');
    }

    /**
    *	This function for view Data Pengajuan Eform by Agen Developer
    *	@param  \Illuminate\Http\Request  $request
    *
    */

    public function DataEform(Request $request)
    {
    	
    	 if($request->ajax() ) return $this->datatables($request);
    	 return view('developer.home_dev_sales.eform_pengajuan.index');
    }

    /**
    *	This function for Datatables Data Pengajuan Eform by Agen Developer
    *	@param  \Illuminate\Http\Request  $request
    *
    */

    public function datatables(Request $request)
    {
$sort = $request->input('order.0');
        $results = Client::setEndpoint('tracking')
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                ])
                ->setQuery([
                'limit'     => $request->input('length'),
                'search'    => $request->input('search.value'),
                'page'      => ( int ) $request->input('page') + 1,
                'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir']
            ])
                ->get();
        //\Log::info($results);

        foreach ($results['contents']['data'] as $key => $type) {
            $type['nominal']  = 'Rp. ' . number_format($type['nominal'], 0, ',', '.');
            $type['action'] = view('layouts.actions', [
                'show' => route('dev-sales.eform-cust', $type['id'])
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

    /**
    * Get List Data Eform Customer By Id
    * @param $id
    */
     public function getDataEform($id)
    {
        $results = Client::setEndpoint('eforms/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                    ])->get();
        $data    = $results['contents'];
        // dd($data);
       // return response()->json(['data' => $data]);
        return view('developer.home_dev_sales.eform_pengajuan.show', [
            'data' => $data
            ]);

    }

    public function getCustomer(Request $request)
    {
        $customers = Client::setEndpoint('customer')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->setQuery([
                'nik' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();
        \Log::info($customers);

        foreach ($customers['contents']['data'] as $key => $cust) {

            $cust['text'] = $cust['nik'];
            $cust['id'] = $cust['id'];
            $customers['contents']['data'][$key] = $cust;
        }

        return response()->json(['customers' => $customers['contents']]);
    }

    public function CustPost(Request $request)
    {
        $input      = $request->all();
        $customer   = Client::setEndpoint('customer')
                    ->setHeaders([
                        'Authorization' => session('authenticate.token')
                        ])->setBody($input)
                    ->post();
        \Log::info($input);
        return redirect()->route('eform.index');
    }

     public function getCust($id)
    {
        $result = Client::setEndpoint('customer/'.$id)
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                    ])->get();
        $data   = $result['contents']['personal'];
        //dd($data);
        return response()->json(['data' => $data ]);
    }
}
