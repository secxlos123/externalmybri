<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Developer\PropertyTypeController;
use App\Http\Requests\Developer\Property\CreateRequest;
use App\Http\Requests\Developer\Property\UpdateRequest;
use Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Avaliable columns property datatables
     *
     * @var array
     */
    protected $columns = [
        'prop_name',
        'prop_city_name',
        'prop_types',
        'prop_items',
        'prop_pic_name',
        'prop_pic_phone',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) return $this->datatables($request);
        if(!empty($request['slug']))
        {
            $slug = $request['slug'];
            $properties =  Client::setEndpoint('propertyNotifCollateral/'.$slug)
                            ->setHeaders([
                                            'Authorization' => session('authenticate.token') 
                                         ])->get();
            $form_notif = $properties['contents'];
           if(!empty($properties['contents']))
           {
                 $form_notif['prop_name'] =  $form_notif['prop_name']; 
                 $form_notif['prop_city_name'] =  $form_notif['prop_city_name'];
                 $form_notif['prop_types'] =  $form_notif['prop_types'];
                 $form_notif['prop_items'] =  $form_notif['prop_items'];
                 $form_notif['prop_pic_name'] =  $form_notif['prop_pic_name'];
                 $form_notif['prop_pic_phone'] =  $form_notif['prop_pic_phone'];
                 $form_notif['action'] = view('layouts.actions', [
                'show' => route('developer.proyek.show', $form_notif['prop_slug']),
                'edit' => route('developer.proyek.edit', $form_notif['prop_slug']),
                'is_approve' => $form_notif['is_approved']
            ])->render();

            $prop_id = $form_notif['prop_id'];
            $dataCollateral =  Client::setEndpoint('collateral/getIdCollateral/'.$prop_id)
                             ->setHeaders([
                              'Authorization' => session('authenticate.token')
                                ])->get();
            if(!empty($dataCollateral['contents']))
            {
                $colleteral_id = $dataCollateral['contents']['collaterals_id'];    
                /*
                * mark read the notification 
                */        

                $reads = Client::setEndpoint('users/notification/read/'.@$colleteral_id.'/'.@$request->get('type'))
                    ->setHeaders([
                      'Authorization' => session('authenticate.token')
                      , 'is_read' => is_read()
                  ])->get();
            }       
            return view( 'developer.property.index-notif',compact('form_notif'));  
            
           }else{
            return view( 'developer.property.index');  
            
           }

           
        }
        else
        {  
            
      
             return view( 'developer.property.index');    
        }
    }

    public function input(CreateRequest $request)
    {
        $input = $request->all();
        $headers= [
                    'Authorization' => session('authenticate.token'),
                    'long' => $request['hidden-long'],
                    'lat' =>  $request['hidden-lat'],
                    'auditaction' => 'tambah proyek'
                  ];
        $query = Client::setEndpoint('property')
                ->setHeaders($headers)
                ->setBody(array_to_multipart($input))
                ->post('multipart');

         if (isset($query['code']) && $query['code'] == 201 ) {
            \Session::flash('flash_message', $query['descriptions']);
            return redirect()->route('developer.proyek.index');
        }else{
            \Session::flash('error_flash_message', $query['descriptions']);
             return redirect()->route('developer.proyek.index');
        }


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->property('create');
    }

    /**
     * [store description]
     *
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        return $this->storeOrUpdate($request, 'property', 'post');
    }

    /**
     * Show detail of property
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        if ( $request->ajax() ) {
            return app(PropertyTypeController::class)->datatables($request, $slug);
        }

        return $this->property('show', $slug);
    }

    /**
     * Show detail of property
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return $this->property('edit', $slug);
    }

    /**
     * Show detail of property
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $slug)
    {
        return $this->storeOrUpdate($request, "property/{$slug}", 'put');
    }

    /**
     * Initial for datatable property / project
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $properties = Client::setEndpoint('property')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'prop_city_id' => $request->input('city'),
                'name'  => $request->input('name_proyek'),
                'pic'   => $request->input('agent'),
                'types' => $request->input('types'),
                'items' => $request->input('items'),
                'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'search'=> $request->input('search.value'),
            ])
            ->get();

        foreach ($properties['contents']['data'] as $key => $property) {
            $property['action'] = view('layouts.actions', [
                'show' => route('developer.proyek.show', $property['prop_slug']),
                'edit' => route('developer.proyek.edit', $property['prop_slug']),
                'is_approve' => $property['is_approved']
            ])->render();
            $properties['contents']['data'][$key] = $property;
        }

        $properties['contents']['draw'] = $request->input('draw');
        $properties['contents']['recordsTotal'] = $properties['contents']['total'];
        $properties['contents']['recordsFiltered'] = $properties['contents']['total'];

        unset(
            $properties['contents']['path'],
            $properties['contents']['prev_page_url'],
            $properties['contents']['next_page_url']
        );

        return response()->json($properties['contents']);
    }

    /**
     * Get property from API
     *
     * @param  string $slug
     * @param  string $view
     * @return \Illuminate\Http\Response
     */
    public function property($view, $slug = null)
    {
        if ( $slug ) {
            $property = Client::setEndpoint("property/{$slug}")
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                ])->get();

        }

        return view("developer.property.{$view}", [
            'property' => $slug ? (object) $property['contents'] : (object) null,
            'validation' => $slug ? UpdateRequest::class : CreateRequest::class
        ]);
    }

    /**
     * Handling for create and update property
     *
     * @param  Request $request
     * @param  string  $endpoint
     * @param  string  $method
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request, $endpoint, $method)
    {
        try {
            $headers = [
                          'Authorization' => session('authenticate.token'),
                          'long' => $request['hidden-long'],
                          'lat' =>  $request['hidden-lat'],
                          'auditaction' => 'edit proyek'
                       ];
            $response = Client::setEndpoint($endpoint)
                    ->setHeaders($headers)
                    ->setBody(array_to_multipart($request->all()))
                    ->{$method}('multipart');
                   // dd($request->all());
            if ( ! in_array($response['code'], [200, 201]) ) {
                $messages = count($response['contents']) > 0 ? json_encode($response['contents']) : $response['descriptions'];
                throw new \Exception($messages, $response['code']);
               // dd($response);
            }

        } catch (\Exception $e) {
            $message = is_json($e->getMessage()) ? json_decode($e->getMessage()) : $e->getMessage();
            return redirect()->back()->withInput()->withErrors($message);
        }

        return redirect()->route('developer.proyek.index');
    }
}
