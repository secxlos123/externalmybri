<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;

class DropdownController extends Controller
{
	/**
     * This logic for get list of developer from api
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function developers(Request $request)
    {
        $body    = [ 'id' => 'dev_id', 'text' => 'company_name' ];
        $options = [ 'search' => $request->input('name') ];
        return $this->init('developers', $body, $options, 'common');
    }

    /**
	 * This logic for get list of properties from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function properties(Request $request)
    {
    	$body 	 = [ 'id' => 'prop_id', 'text' => 'prop_name' ];
    	$options = [ 'dev_id' => $request->input('dev_id'), 'search' => $request->input('name'), 'dropdown' => true ];
        return $this->init('property', $body, $options, $this->base());
    }

    /**
	 * This logic for get list of property types from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function types(Request $request)
    {
    	$body 	 = [ 'id' => 'id', 'text' => 'name' ];
    	$options = [ 'property_id' => $request->input('prop_id'), 'search' => $request->input('name'), 'dropdown' => true ];
        return $this->init('property-type', $body, $options, $this->base());
    }

    /**
	 * This logic for get list of property items / units from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function units(Request $request)
    {
    	$body 	 = [ 'id' => 'id', 'text' => 'address' ];
    	$options = [
            'property_type_id' => $request->input('prop_type_id'),
            'search' => $request->input('name'),
            'dropdown' => true
        ];

        return $this->init('property-item', $body, $options, $this->base());
    }

    /**
	 * This logic for get list of cities from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function cities(Request $request)
    {
    	$body 	 = [ 'text' => 'name' ];
    	$options = [ 'name' => $request->input('name') ];
        return $this->init('cities', $body, $options);
    }

    /**
	 * This logic for get list of jobs from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function jobs(Request $request)
    {
    	$body 	 = [ 'text' => 'name' ];
    	$options = [ 'search' => $request->input('name') ];
        return $this->init('job-list', $body, $options);
    }

    /**
	 * This logic for get list of job types from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function jobTypes(Request $request)
    {
    	$body 	 = [ 'text' => 'name' ];
    	$options = [ 'search' => $request->input('name') ];
        return $this->init('job-type-list', $body, $options);
    }

    /**
     * This logic for get list of job fields from api
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function jobFields(Request $request)
    {
        $body    = [ 'text' => 'name' ];
        $options = [ 'search' => $request->input('name') ];
        return $this->init('job-field-list', $body, $options);
    }

    /**
	 * This logic for get list of job fields from api
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function positions(Request $request)
    {
    	$body 	 = [ 'text' => 'name' ];
    	$options = [ 'search' => $request->input('name') ];
        return $this->init('positions', $body, $options);
    }

    /**
     * This logic for get list of citizenships from api
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function citizenships(Request $request)
    {
        $body    = [ 'text' => 'name' ];
        $options = [ 'search' => $request->input('name') ];
        return $this->init('citizenship-list', $body, $options);
    }

    /**
	 * This logic for get list of nearby office
	 *
	 * @param  Request $request
     * @return \Illuminate\Http\Response
	 */
    public function offices(Request $request)
    {
        if ($request->has('distance')) {
            if (!$request->has('long') && !$request->has('lat')) {
                $request->merge([
                    'lat' => -6.217458,
                    'long' => 106.813880
                ]);
            }
        }
    	$body 	 = [ 'text' => 'unit', 'id' => 'branch' ];
        return $this->init('offices', $body, $request->only(['name', 'distance', 'long', 'lat', 'name']));
    }

    /**
     * This checking for role user
     *
     * @return string
     */
    private function base()
    {
        return session('authenticate.role') == 'developer' ? 'eks' : 'common';
    }

    /**
     * This function for init request to API
     *
     * @param  string $endpoint
     * @param  array  $body
     * @param  array  $options
     * @return \Illuminate\Http\Response
     */
    public function init($endpoint, array $body, array $options = [], $base = 'eks')
    {
    	$results = Client::setBase($base)->setEndpoint($endpoint)
        	->setHeaders( [ 'Authorization' => session('authenticate.token') ] )
            ->setQuery( array_merge(['page' => request()->get('page', 1) ], $options) )
            ->get();

        foreach ($results['contents']['data'] as $key => $result) {

        	if ( isset( $body['id'] ) ) {
        		$result['id'] 	= $result[ $body['id'] ];
        	}

            $result['text'] = $result[ $body['text'] ];
            $results['contents']['data'][$key] = $result;
        }

        return response()->json(['results' => $results['contents']]);
    }

    /**
    *   Get Kanwil from API
    */

    public function getKanwil()
    {
        $kanwil = Client::setEndpoint('kanwil-list')
                ->setHeaders([
                    'Authorization' => session('authenticate.token')
                    ])
                ->get();
    
        foreach ($kanwil['contents']['data'] as $key => $value) {

            $value['id'] = $value['region_id'];
            $value['text'] = $value['region_name'];
            $kanwil['contents']['data'][$key] = $value;
        }

        return response()->json(['result' => $kanwil['contents']]);
    }
}
