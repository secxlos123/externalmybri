<?php

namespace App\Http\Requests\Developer\PropertyType;

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
            'name'  => 'required',
            'price' => 'required',
            'bathroom'  => 'required|numeric|between:0,4',
            'bedroom'   => 'required|numeric|between:0,4',
            'floors'    => 'required|numeric|between:0,4',
            'carport'   => 'required|numeric|between:0,4',
            'property_id'   => 'required',
            'surface_area'  => 'required|numeric|between:50,10000',
            'certificate'   => 'required',
            'building_area' => 'required|numeric|between:30,500',
            'electrical_power'  => 'required',
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
            'name.required'  => 'Bidang isian nama tipe proyek harus diisi',
            'price.required' => 'Bidang isian harga harus diisi',
            'bathroom.required'  => 'Bidang isian kamar mandi harus diisi',
            'bedroom.required'  => 'Bidang isian kamar tidur harus diisi',
            'floors.required'  => 'Bidang isian tipe jumlah lantai harus diisi',
            'carport.required'  => 'Bidang isian tipe garasi harus diisi',
            'property_id.required'  => 'Bidang isian nama proyek harus diisi',
            'surface_area.required'  => 'Bidang isian luas tanah harus diisi',
            'certificate.required'  => 'Bidang isian jenis sertifikat harus diisi',
            'building_area.required'  => 'Bidang isian luas bangunan harus diisi',
            'electrical_power.required'  => 'Bidang isian daya listrik harus diisi',
            'surface_area.between' => 'Bidang isian Luas Tanah minimal 50 dan maksimal 10000',
            'building_area.between' => 'Bidang isian Luas Bangunan minimal 30 dan maksimal 500'
        ];
    }
}
