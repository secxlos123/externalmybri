<?php

namespace App\Http\Requests\Developer\Property;

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
            'name'      => 'required',
            'city_id'   => 'required',
            'category'  => 'required|in:0,1,2',
            'pic_name'  => 'required',
            'pic_phone' => 'required|string|regex:/^[0-9]+$/|min:9|max:16',
            'photo'     => 'required|image|max:1024',
            'address'   => 'required',
            'latitude'  => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'facilities'  => 'required',
        ];
    }
}
