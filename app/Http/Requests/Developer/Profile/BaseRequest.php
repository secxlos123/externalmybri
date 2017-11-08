<?php

namespace App\Http\Requests\Developer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
            'nik'              => 'required|numeric|digits:16',
            'first_name'       => 'required',
            'mobile_phone'     => 'required|numeric|digits_between:9,16',
            'birth_place_id'   => 'required',
            'birth_date'       => 'required|date',
            'address'          => 'required',
            'city_id'          => 'required',
            'gender'           => 'required|in:L,P',
            'citizenship_id'   => 'required',
            'status'           => 'required|in:1,2,3',
            'address_status'   => 'required',
            'mother_name'      => 'required',
            'identity'         => 'required|image|max:1024',
            'company_name'     => 'required'
        ];
    }
}
