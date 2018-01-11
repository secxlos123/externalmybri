<?php

namespace App\Http\Controllers;

use App\Classes\Traits\Profileble;
use App\Http\Requests\EformRequest;
use App\Http\Requests\Customer\CustomerRequest;
use Client;
use Illuminate\Http\Request;

class EformController extends Controller
{
    use Profileble;

    /**
     * Avaliable data customer simple
     *
     * @var array
     */
    protected $simple = [
        'nik', 'first_name', 'last_name', 'birth_place_id', 'birth_date', 'address','current_address', 'city_id', 'gender', 'status', 'address_status', 'mobile_phone', 'mother_name', 'identity', 'couple_nik',
        'couple_name', 'couple_birth_place_id', 'couple_birth_date', 'couple_identity', 'is_simple', 'work_field','work_type', 'work', 'work_field_name', 'work_type_name', 'work_name', 'position', 'position_name', 'citizenship_id', 'citizenship', 'hidden-long', 'hidden-lat'
    ];

    /**
     * Avaliable data customer complete
     *
     * @var array
     */
    protected $complete = [
        'birth_place', 'work_field','work_type', 'work', 'company_name', 'position', 'office_address',
        'salary', 'other_salary', 'loan_installment', 'dependent_amount', 'emergency_name',
        'emergency_contact', 'emergency_relation', 'city', 'work_duration', 'phone', 'couple_salary',
        'couple_other_salary', 'couple_loan_installment', 'work_duration_month', 'work_duration',
        'citizenship_id', 'citizenship', 'work_field_name', 'work_type_name', 'work_name', 'position', 'position_name', 'source_income','hidden-long', 'hidden-lat'
    ];

    /**
     * Avaliable data eform
     *
     * @var array
     */
    protected $eform = [
        'product_type', 'status_property', 'developer', 'developer_name', 'property', 'property_name', 'price', 'building_area', 'property_type','property_type_name','property_item','property_item_name', 'home_location', 'year',
        'active_kpr', 'dp', 'request_amount', 'nik', 'branch_id', 'appointment_date', 'address_location', 'longitude', 'latitude', 'kpr_type_property', 'sales_dev_id','hidden-long','hidden-lat'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.api', ['except' => [ 'verify', 'confirmation' ] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(!empty($request->get('ids') )){
        /*
        * mark read the notification
        */
        Client::setEndpoint('users/notification/read/'.@$request->get('ids').' ')
               ->setHeaders([
                'Authorization' => session('authenticate.token')
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->get();
      }

        if ( 'developer' == session('authenticate.role') ) {
            return 'Hallo Developer....';
        }

        if ( 'developer-sales' == session('authenticate.role') ) {
            return view('eforms.index', [
                'customer' => (object) [],
                'param' => []
            ]);
        }

        config(['jsvalidation.focus_on_error' => false]);
        return view('eforms.index', [
            'customer' => (object) $this->customer(),
            'param' => $request->all()
        ]);
    }

    /**
    * Display a listing of the resource Form Eform Agen Dev
    * @return \Illuminate\Http\Response
    */

    public function formEform(Request $request)
    {
        if ('developer-sales' == session('authenticate.role'))
        {
          $results = Client::setEndpoint('profile')
          ->setHeaders(['Authorization' => session('authenticate.token')])->get();

            return view('eforms.eform-agent', [
                'customer' => (object) [],
                'param'    => [],
                'results'  => $results['contents']
                ]);
        }

        config(['jsvalidation.focus_on_error' => false]);
        return view('eforms.index', [
            'customer' => (object) $this->customer(),
            'param' => $request->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EformRequest $request)
    {

        try {
            \Log::info($request->all());
            if (session('authenticate.role') == 'customer') {
                // This is update customer data if customer created eform
                $customer = $this->registered($request);
            }

            // This is submit application eform to Api
            $eform = $this->postToApi($request->only($this->eform), 'eforms');
        } catch (\Exception $e) {
            // redirect back if having error from server Api
            $message = is_json($e->getMessage()) ? json_decode($e->getMessage()) : $e->getMessage();
            return redirect()->back()->withInput()->withErrors($message);
        }

        // redirect to route eform.index if success created eform
        return redirect()->route('eform.success')->withSuccess($eform['contents']);
    }

    /**
     * Update status verification data customer
     *
     * @param  Request  $request
     * @param  string   $token
     * @param  string   $status
     * @return \Illuminate\Http\Response
     */
    public function verify($token, $status, Request $request)
    {
        $headers= [
                  'auditaction' => $status.' verifikasi'
                 ];

        if(!empty($request['hidden-lat']) && !empty($request['hidden-lat'])){
            $headers= [
                    'Authorization' => session('authenticate.token'),
                    'long' => $request['hidden-long'],  
                    'lat' =>  $request['hidden-lat'],  
                    'auditaction' => $status.' verifikasi'
                  ];
        }  
        $response = Client::setEndpoint("eform/{$token}/{$status}")
        ->setHeaders($headers)
        ->get();

        if (in_array( $response['code'], [200, 201] )) {
            return redirect()->route('eform.confirmation')->withSuccess(
                compact('status')
            );
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
        return session('success') ? view('eforms.confirmation', ['status' => session('success.status')]) : redirect('/');
    }

    /**
     * Show page success submit eform
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return session('success') ? view('eforms.success') : redirect('/');
    }

    /**
     * This is for mapping data customer if customer have change profile
     *
     * @param  Request $request [description]
     * @return array | throw
     */
    public function registered(Request $request)
    {
        if ($request->input('selector') == '1') {
            $endpoint = 'simple';
            $customer = $this->simple;
        } else {
            $endpoint = 'complete';
            $customer = array_merge($this->simple, $this->complete);
        }

        if ( $request->input('is_simple') == '1' || ! $request->file('identity') ) {
            unset($customer['identity']);
        }

        if ( $request->input('status') != '2' ) {
            unset(
                $customer['couple_identity'], $customer['couple_name'], $customer['couple_nik'],
                $customer['couple_birth_date'], $customer['couple_birth_place_id']
            );
        }

        \Log::info($request->only($customer));

        return $this->postToApi($request->only($customer), "auth/register-{$endpoint}");
    }

    /**
     * This function for execution post to Api
     *
     * @param  array  $data
     * @param  string $endpoint
     * @return array | throw
     */
    public function postToApi(array $data, $endpoint)
    {
        if (isset($data['address_location'])) {
            $data['address'] = $data['address_location'];
        }
        
        $response = Client::setEndpoint($endpoint)
             ->setHeaders(
                ['Authorization' => session('authenticate.token'),
                 'long' => array_key_exists('hidden-long', $data) ? $data['hidden-long'] : null,  
                 'lat' =>  array_key_exists('hidden-lat', $data) ? $data['hidden-lat'] : null,
                 'auditaction' => array_key_exists('longitude', $data) ?  'Pengajuan Kredit' : null,
                ]
              )
            ->setBody(array_to_multipart($data))
            ->post('multipart');

        if ( ! in_array($response['code'], [200, 201]) ) {
            if ($response['code'] == 422 && $endpoint == 'eforms') {
              throw new \Exception(json_encode($response['descriptions']), $response['code']);
            }

            throw new \Exception(json_encode($response['contents']), $response['code']);
        }

        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCustomer(Request $request)
    {
        $customers = Client::setEndpoint('customer')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->setQuery([
                'nik' => $request->input('name'),
                'page' => $request->input('page'),
                'eform'=> $request->has('eform') ? $request->input('eform') : true
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

    /**
     * Display a detail of customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailCustomer(Request $request)
    {
        $customerData = Client::setEndpoint('customer/'.$request->input('nik'))
                        ->setHeaders([
                            'Authorization' => session('authenticate.token')
                        ])->get();
        $dataCustomer = $customerData['contents'];
        \Log::info($customerData);

        if(($customerData['code'])==200){
            $view = (String)view('eforms.agent.detail-customer')
                ->with('dataCustomer', $dataCustomer)
                ->render();

            return response()->json(['view' => $view]);
        } else {
            $view = (String)view('eforms.agent.error')
                ->with('dataCustomer', $dataCustomer)
                ->render();

            return response()->json(['view' => $view]);
        }
    }

    public function getCust(Request $request)
    {
        $result = Client::setEndpoint('customer')
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                    ])
                ->setQuery([
                    'nik'   => $request->input('nik')
                    ])
                ->get();
        $data   = $result['contents']['data'][0];
        //dd($data);
        return response()->json(['data' => $data ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCustomer(CustomerRequest $request)
    {
      
        \Log::info($request->all());
 
        $newCustomer = $this->dataRequest($request);
        
        $client = Client::setEndpoint('customer')
            ->setHeaders([
                'Authorization' => session('authenticate.token'),
                'long' => $request['hidden-long'],  
                'lat' =>  $request['hidden-lat'],
                'auditaction' => 'Tambah Leads',
            ])->setBody($newCustomer)
            ->post('multipart');

        $codeResponse = $client['code'];
        $codeDescription = $client['descriptions'];

        if($codeResponse == 201)
        {
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }
        elseif($codeResponse == 422)
        {
            return response()->json($client);
        }
        elseif($codeResponse == 404)
        {
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }
        else
        {
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }
    }

    public function formlead()
    {
        return view('eforms.formlead');
    }

    public function add_cust(Request $request)
    {
        $input = $request->all();
        $client = Client::setEndpoint('customer')
        ->setHeaders([
            'Authorization' => session('authenticate.token')
            ])
        ->setBody($input)
        ->post('multipart');

        $codeResponse = $client['code'];
        $codeDescription = $client['descriptions'];
        return response()->json(['message'=> $codeDescription, 'code' => $codeResponse]);
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function dataRequest($request)
    {
        $first_name = $this->split_name($request)['0'];
        $last_name = $this->split_name($request)['1'];

        $name = array(
            [
              'name'     => 'first_name',
              'contents' => $first_name,
            ],
            [
              'name'     => 'last_name',
              'contents' => $last_name,
            ],
        );

        $imgReq = $request->identity;
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                    'name'     => 'identity',
                    'filename' => $image_name,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen( $image_path, 'r' ),
                ];

        if($request->couple_identity){
            $imgReq = $request->couple_identity;
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $couple[] = [
                'name'     => 'couple_identity',
                'filename' => $image_name,
                'Mime-Type'=> $image_mime,
                'contents' => fopen( $image_path, 'r' ),
            ];
            $allReq = $request->except(['identity', '_token', 'couple_identity', 'full_name']);
            foreach ($allReq as $index => $req) {
            $inputData[] = [
                'name'     => $index,
                'contents' => $req
                ];
            }
            $newCustomer = array_merge($image, $inputData, $couple, $name);
        }else{
            $allReq = $request->except(['identity', '_token', 'full_name']);
            foreach ($allReq as $index => $req) {
                $inputData[] = [
                    'name'     => $index,
                    'contents' => $req
                ];
            }
            $newCustomer = array_merge($image, $inputData, $name);
        }

        return $newCustomer;
    }

    /**
     * uses regex that accepts any word character or hyphen in last name
     *
     * @param  \Illuminate\Http\Request  $request
     */
    function split_name($request) {
        $name = trim($request->full_name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    }
}
