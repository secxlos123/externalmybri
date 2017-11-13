<?php

namespace App\Http\Requests\Developer\Profile;

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
            'mobile_phone'     => 'required',
            'birth_place_id'   => 'required',
            'birth_date'       => 'required|date',
            'address'          => 'required',
            'city_id'          => 'required',
            'gender'           => 'required|in:L,P',
            'citizenship_id'   => 'required',
            'status_id'        => 'required|in:1,2,3',
            'address_status_id'=> 'required|in:0,1,3',
            'mother_name'      => 'required',
            'identity'         => 'image|max:1024'
        ];
    }
}
