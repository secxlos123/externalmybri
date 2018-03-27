<?php

namespace App\Http\Requests\Developer\Agent;

class UpdateRequest extends BaseRequest
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
            'email'         => 'email|required',
            'mobile_phone'  => 'required|string|regex:/^[0-9]+$/|max:15',
            'birth_date'    => 'required|date|date_format:d-m-Y|before:today',
            'join_date'     => 'required|date|date_format:d-m-Y'
        ];
    }

     public function messages()
    {
        return [
            'name.required'         => 'Kolom Nama Harus diisi',
            'email.required'        => 'Kolom email harus diisi',
            'mobile_phone.required' => 'Kolom Nomor handphone harus diisi',
            'birth_date.required'   => 'Kolom tanggal lahir harus diisi.',
            'join_date.required'    => 'Kolom tanggal lahir harus diisi',
        ];
    }
}
