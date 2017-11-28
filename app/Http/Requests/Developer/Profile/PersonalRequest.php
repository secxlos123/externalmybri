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
            'nik'              => 'numeric|digits:16',
            'first_name'       => 'required',
            'mobile_phone'     => '',
            'birth_place_id'   => '',
            'birth_date'       => 'date',
            'address'          => '',
            'city_id'          => '',
            'gender'           => 'in:L,P',
            'citizenship_id'   => '',
            'status_id'        => 'in:1,2,3',
            'address_status_id'=> 'in:0,1,3',
            'mother_name'      => '',
            'identity'         => 'image|max:1024'
        ];
    }
}
