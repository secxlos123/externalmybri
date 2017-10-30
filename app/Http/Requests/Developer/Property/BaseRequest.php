<?php

namespace App\Http\Requests\Developer\Property;

use App\Http\Requests\BaseRequest as FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'city_id'   => 'required',
            'category'  => 'required|in:0,1,2',
            'pic_name'  => 'required',
            'pic_phone' => 'required|numeric|digits_between:9,16',
            'photo'     => 'required|image|max:1024',
            'address'   => 'required',
            'latitude'  => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'facilities'  => 'required',
        ];
    }

    /**
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $this->merge(['latitude' => '-6.2773', 'longitude' => '106.66101']);
        return parent::getValidatorInstance();
    }
}
