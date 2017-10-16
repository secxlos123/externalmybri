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

    /**
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $this->merge([ 'price' => str_replace('.', '', $this->input('price')) ]);
        return parent::getValidatorInstance();
    }
}
