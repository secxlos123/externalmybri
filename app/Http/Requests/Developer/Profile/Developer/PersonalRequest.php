<?php

namespace App\Http\Requests\Developer\Profile\Developer;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'required',
            'address'          => 'required',
            'city_id'          => 'required',
            'mobile_phone'     => 'required',
            'image'            => 'required|image|max:1024'
        ];
    }
}
