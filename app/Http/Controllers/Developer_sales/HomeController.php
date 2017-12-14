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
    	$data_eform = Client::setEndpoint('eforms')
    	->setHeaders(['Authorization' => session('authenticate.token')])
    	->setQuery([
            //'limit'            => $request->input('length'),
            'page'       => (int) $request->input('page') + 1,
    		'ref_number' => $request->input('ref_number'),
    		'leads'		 => $request->input('nik'),
    		'status'	 => $request->input('stat_pengajuan'),
    		'sort' 		 => $this->columns[$sort['column']] .'|'. $sort['dir'],
    		'search'	 => $request->input('search.value'),
    		])
    	->get();
		//dd($data_eform['contents']['data']);
    	foreach ($data_eform['contents']['data'] as $key => $eform) {
    		$eform['action'] = view('layouts.actions', [
    			 'show' => route('dev-sales.eform-cust', $eform['id'])
    			] )->render();
    		$data_eform['contents']['data'][$key] = $eform;
    	}

    	$data_eform['contents']['draw'] = $request->input('draw');
    	$data_eform['contents']['recordsTotal'] = $data_eform['contents']['total'];
    	$data_eform['contents']['recordsFiltered'] = $data_eform['contents']['total'];

    	unset(
    		$data_eform['contents']['path'],
    		$data_eform['contents']['prev_page_url'],
    		$data_eform['contents']['next_page_url']
    		);
    	return response()->json($data_eform['contents']);
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
