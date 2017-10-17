<?php

namespace App\Http\Requests\Developer\PropertyItem;

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
            'price'  => 'required',
            'status' => 'required',
            'address' => 'required',
            'property'=> 'required',
            'property_type_id' => 'required',
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
