<?php

namespace App\Http\Controllers;

use App\Classes\Traits\Profileble;
use App\Http\Requests\EformRequest;
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
        'nik', 'first_name', 'last_name', 'birth_place_id', 'birth_date', 'address', 'city_id', 'gender',
        'citizenship_id', 'status', 'address_status', 'mobile_phone', 'mother_name', 'identity',
    ];

    /**
     * Avaliable data customer complete
     *
     * @var array
     */
    protected $complete = [
        'birth_place', 'work_field','work_type', 'work', 'company_name', 'position', 'work_year', 'work_mount',
        'office_address', 'salary', 'other_salary', 'loan_installment', 'dependent_amount', 'emergency_name',
        'emergency_contact', 'emergency_relation', 'citizenship', 'city', 'work_duration', 'phone'
    ];

    /**
     * Avaliable data eform
     *
     * @var array
     */
    protected $eform = [
        'product_type', 'status_property', 'developer', 'property', 'price', 'building_area', 'home_location', 'year',
        'active_kpr', 'dp', 'request_amount', 'nik', 'branch_id', 'appointment_date', 'address', 'longitude', 'latitude'
    ];

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

        config(['jsvalidation.focus_on_error' => false]);
        return view('eforms.index', [
            'customer' => (object) $this->customer()
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

            if (session('authenticate.role') == 'customer') {
                // This is update customer data if customer created eform
                $customer = $this->registered($request);
            }

            // This is submit application eform to Api
            $eform = $this->postToApi($request->only($this->eform), 'eforms');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
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
    public function verify(Request $request, $token, $status)
    {
        $response = Client::setEndpoint("eform/{$token}/{$status}")->get();

        if ($response['code'] == 200) {
            return redirect()->route('eform.confirmation')->withSuccess($status);
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

            $request->merge([ 
                'city' => $request->input('city_id'),
                'birth_place' => $request->input('birth_place_id'),
                'citizenship' => $request->input('citizenship_id'),
                'work_duration' => (int) $request->input('work_year') + ( (int) $request->input('work_mount') / 12 ),
            ]);
            
            unset( $customer['birth_place_id'], $customer['city_id'], $customer['citizenship_id'] );
        }

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
        $response = Client::setEndpoint($endpoint)
            ->setHeaders(['Authorization' => session('authenticate.token')])
            ->setBody(array_to_multipart($data))
            ->post('multipart');

        if ( ! in_array($response['code'], [200, 201]) ) {
            throw new \Exception(json_encode($response['contents']), $response['code']);
        }

        return $response;
    }
}
