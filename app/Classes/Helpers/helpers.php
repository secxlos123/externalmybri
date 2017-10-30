<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

if (! function_exists('array_to_multipart')) {

    /**
     * Convert array to format multipart/form-data.
     *
     * @param  array $array
     * @param  string|null $parent
     * @return array
     */
	function array_to_multipart(array $array, $parent = '')
	{
        $dates    = ['birth_date', 'couple_birth_date', 'appointment_date'];
        $requests = []; $is_array = [];

        foreach ($array as $key => $value) {
            if ( ! is_null($value) ) {
                $attribute['name'] = $parent ? "{$parent}[{$key}]" : $key;

                if ( is_array($value) ) {
                    $is_array = array_to_multipart($value, $key);
                } else if ( is_file($value) ) {
                    $attribute['contents'] = fopen($value->getRealPath(), 'r');
                } else if ( in_array($key, $dates) ) {
                    $attribute['contents'] = date('Y-m-d', strtotime($value));
                } else {
                    $attribute['contents'] = $value;
                }
            
                $requests[] = $attribute;
            }
        }

        return array_merge_recursive($requests, $is_array);
	}
}

if (! function_exists('string_to_uploaded_file')) {

    /**
     * Convert string path to object uploaded file.
     *
     * @param  string $path
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
	function string_to_uploaded_file($path)
	{
        $mimeType = mime_content_type($path);
        $filename = pathinfo($path)['filename'];
        $size = filesize($path);
        return new UploadedFile($path, $filename, $mimeType, $size);
	}
}

if (! function_exists('extract_dir_to_request')) {

    /**
     * Extract directory and merge to request
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $dir
     * @param  string $drive
     * @param  string $param
     * @return void
     */
    function extract_dir_to_request(Request $request, $dir, $drive, $param = 'photos')
    {
        if ( array_key_exists($drive, config('filesystems.disks')) ) {
            $storage = Storage::disk($drive);
            $photos  = $storage->allFiles($dir);

            foreach ($photos as $key => $photo) {
                $file = str_replace("{$dir}/", '', $photo);
                if ( ! in_array($file, $request->get('uploaded', [])) ) {
                    unset( $photos[$key] );
                    continue;
                }
                $files[] = string_to_uploaded_file( public_path("storage/{$drive}/{$photo}") );
                $request->merge( [ $param =>  $files ] );
            }

            $request->replace($request->except(['_token', 'uploaded']));
        }
    }
}

if (! function_exists('is_json')) {

    /**
     * Check if variable is valid json
     *
     * @param  string $dir
     * @return boolean
     */
    function is_json($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

if (! function_exists('image_checker')) {

    /**
     * Check if variable is valid json
     *
     * @param  string $dir
     * @return boolean
     */
    function image_checker($path = null)
    {
        if (is_null($path)) {
            return $link="https://mybri-api.stagingapps.net/img/noimage.jpg";
        }else{
            return $path;
        }
    }
}

if (! function_exists('sd')) {

    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function sd(...$args)
    {
        echo "<pre>";

        foreach ($args as $x) {
            print_r($x);
            echo PHP_EOL;
        }

        die(1);
    }
}