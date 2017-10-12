<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UploadController extends Controller
{
	/**
	 * This logic for handling upload file dropzone
	 * 
	 * @param  Request $request [description]
     * @return \Illuminate\Http\Response
	 */
    public function upload(Request $request)
    {
    	if ( count($request->file('files')) == 5 ) {
    		Storage::deleteDirectory('public/property_types/tmp/'.$request->get('_token'));
    	} else {
    		$this->remove($request);
    	}

    	$json['files'] = collect([]);
        foreach ($request->file('files', []) as $photo) {
        	$filename = rand().'.'.$photo->getClientOriginalExtension();
            $path = $photo->storeAs('tmp/'.$request->get('_token'), $filename, 'property_types');
            $json['files']->push([
                'name' => $filename,
                'size' => $photo->getSize(),
                'type' => $photo->getMimeType(),
            ]);
        }
        return response()->json($json);
    }

    /**
     * [remove description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function remove(Request $request)
    {
    	$removes = explode(',', $request->input('removed'));
    	$todoRemove = [];

    	foreach ($removes as $remove) {
	    	$file = "tmp/{$request->get('_token')}/$remove";
	    	$dirOrFile = public_path("storage/property_types/{$file}");
    		if ( file_exists($dirOrFile) && ! is_dir($dirOrFile) ) $todoRemove[] = $file;
    	}

    	return Storage::disk('property_types')->delete($todoRemove);
    }
}
