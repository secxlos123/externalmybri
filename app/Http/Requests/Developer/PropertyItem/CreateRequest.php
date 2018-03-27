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
            'price'             => 'required',
            'status'            => 'required',
            'address'           => 'required',
            'property'          => 'required',
            'property_type_id'  => 'required',
            'first_unit'        => 'required|numeric',
            'last_unit'         => 'required|numeric',
            'unit_size'         => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'price.required'             => 'Bidang isian harga harus diisi',
            'status.required'            => 'Bidang isian status harus diisi',
            'address.required'           => 'Bidang isian alamat harus diisi',
            'property.required'          => 'Bidang isian proyek harus diisi',
            'property_type_id.required'  => 'Bidang isian tipe proyek harus diisi',
            'first_unit.required'        => 'Bidan isian no pertama harus diisi',
            'last_unit.required'         => 'Bidan isian no terakhir harus diisi',
            'unit_size.required'         => 'Periksa Kembali bidang isian no pertama dan terakhir'
        ];
    }
}
