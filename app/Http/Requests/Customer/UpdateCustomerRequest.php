<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            "nik"                   => "required",
            "email"                 => "required|email",
            "full_name"             => "required",
            "birth_place"           => "required",
            "birth_date"            => "required",
            "address"               => "required",
            "gender"                => "required",
            // "city"                  => "required",
            "phone"                 => "required",
            "citizenship"           => "required",
            "status"                => "required",
            "address_status"        => "required",
            "mother_name"           => "required",
            "mobile_phone"          => "required",
            "emergency_contact"     => "required",
            "emergency_relation"    => "required",
            // "identity"              => "required|mimes:jpeg,jpg,png",
            // "npwp"                  => "required|mimes:jpeg,jpg,png",
            // "images"                 => "required|mimes:jpeg,jpg,png",
            "work_type"             => "required",
            "work"                  => "required",
            "company_name"          => "required",
            "work_field"            => "required",
            "position"              => "required",
            "work_duration"         => "required",
            "office_address"        => "required",
            "salary"                => "required",
            "other_salary"          => "required",
            "loan_installment"      => "required",
            "dependent_amount"      => "required"
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
            "nik.required"                   => "NIK harus diisi",
            "email.required"                 => "Email harus diisi",
            "full_name.required"             => "Nama Lengkap harus diisi",
            "birth_place.required"           => "Tempat Lahir harus diisi",
            "birth_date.required"            => "Tanggal Lahir harus diisi",
            "address.required"               => "Alamat Harus diisi",
            "gender.required"                => "Jenis Kelamin harus diisi",
            // "city.required"                  => "required",
            "phone.required"                 => "Nomor Telepon harus diisi",
            "citizenship.required"           => "Kewarganegaraan harus diisi",
            "status.required"                => "Status harus diisi",
            "address_status.required"        => "Status Tempat Tinggal harus diisi",
            "mother_name.required"           => "Nama Ibu harus diisi",
            "mobile_phone.required"          => "Nomor Handphone harus diisi",
            "emergency_contact.required"     => "Kontak darurat harus diisi",
            "emergency_relation.required"    => "Hubungan kontak harus diisi",
            // "identity.required"              => "KTP harus diisi",
            // "npwp.required"                  => "NPWP harus diisi",
            // "images.required"                => "Foto harus diisi",
            "work_type.required"             => "Jenis Pekerjaan harus diisi",
            "work.required"                  => "Pekerjaan harus diisi",
            "company_name.required"          => "Nama Perusahaan harus diisi",
            "work_field.required"            => "Bidang Pekerjaan harus diisi",
            "position.required"              => "Jabatan harus diisi",
            "work_duration.required"         => "Lama kerja harus diisi",
            "office_address.required"        => "Alamat kantor harus diisi",
            "salary.required"                => "Pendapatan harus diisi",
            "other_salary.required"          => "Pendapatan lain harus diisi",
            "loan_installment.required"      => "Angsuran permohonan harus diisi",
            "dependent_amount.required"      => "Jumlah Angsuran harus diisi"
        ];
    }
}
