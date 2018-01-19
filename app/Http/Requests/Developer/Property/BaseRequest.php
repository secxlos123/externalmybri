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
            'pks_number'=> 'required',
            'pic_name'  => 'required',
            'pic_phone' => 'required|string|regex:/^[0-9]+$/|min:9|max:12',
            'photo'     => 'required|image|max:1024',
            'address'   => 'required',
            'region_id' => 'required',
            //'latitude'  => 'required',
            //'longitude' => 'required',
            'description' => 'required',
            'facilities'  => 'required',
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
            'name.required' => 'Bidang isian nama harus diisi',
            'city_id.required'  => 'Bidang isian kota harus diisi',
            'category.required'  => 'Bidang isian kategori harus diisi',
            'pks_number.required'  => 'Bidang isian nomor PKS harus diisi',
            'pic_name.required'  => 'Bidang isian nama PIC harus diisi',
            'pic_phone.required'  => 'Bidang isian nomor handphone PIC harus diisi',
            'photo.required'  => 'Bidang isian foto harus diisi',
            'address.required'  => 'Bidang isian alamat harus diisi',
            'region_id.required'  => 'Bidang isian kantor wilayah harus diisi',
            'description.required'  => 'Bidang isian deskripsi harus diisi',
            'facilities.required'  => 'Bidang isian fasilitas harus diisi',
        ];
    }
}
