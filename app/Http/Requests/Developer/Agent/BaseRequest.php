<?php

namespace App\Http\Requests\Developer\Agent;

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
            'mobile_phone'  => 'required|numeric',
            'birth_date'    => 'required|date_format:d-m-Y',
            'join_date'     => 'required|date_format:d-m-Y'
        ];
    }
}
