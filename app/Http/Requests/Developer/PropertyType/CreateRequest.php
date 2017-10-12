<?php

namespace App\Http\Requests\Developer\PropertyType;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $image = strtolower( $this->method() ) == 'post' 
            ? [] 
            // ? ['uploaded.*' => 'required'] 
            : [];

        return array_merge([
            'name'  => 'required',
            'price' => 'required|numeric',
            'bathroom'  => 'required|numeric|between:0,4',
            'bedroom'   => 'required|numeric|between:0,4',
            'floors'    => 'required|numeric|between:0,4',
            'carport'   => 'required|numeric|between:0,4',
            'property_id'   => 'required',
            'surface_area'  => 'required|numeric',
            'certificate'   => 'required',
            'building_area' => 'required|numeric',
            'electrical_power'  => 'required',
        ], $image);
    }
}
