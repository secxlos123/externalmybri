<?php

namespace App\Http\Requests\Developer\PropertyItem;

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
            'price'  => 'required',
            'status' => 'required',
            'address' => 'required',
            'property'=> 'required',
            'property_type_id' => 'required',
        ];
    }
}
