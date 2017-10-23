<?php

namespace App\Http\Requests\Developer\PropertyType;

use App\Http\Requests\BaseRequest as FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'price' => 'required',
            'bathroom'  => 'required|numeric|between:0,4',
            'bedroom'   => 'required|numeric|between:0,4',
            'floors'    => 'required|numeric|between:0,4',
            'carport'   => 'required|numeric|between:0,4',
            'property_id'   => 'required',
            'surface_area'  => 'required|numeric',
            'certificate'   => 'required',
            'building_area' => 'required|numeric',
            'electrical_power'  => 'required',
        ];
    }
}
