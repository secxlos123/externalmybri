<?php

namespace App\Http\Requests\Pihakke3\Profile;

use App\Http\Requests\BaseRequest as FormRequest;
use Carbon\Carbon;

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
            'name'          => 'required',
            'email'         => 'required',
            'phone_number'  => 'required|numeric',
            'addres'        => 'required',
            'city_id'       => 'required|numeric'
        ];
    }
}
