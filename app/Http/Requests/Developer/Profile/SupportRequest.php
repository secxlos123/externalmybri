<?php

namespace App\Http\Requests\Developer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
            'npwp'         => 'mimes:pdf,jpeg,jpg,png,gif|max:10000',
            'family_card'  =>'mimes:pdf,jpeg,jpg,png,gif|max:10000',
            'couple_identity'=>'mimes:pdf,jpeg,jpg,png,gif|max:10000',
            'marrital_certificate'=>'mimes:pdf,jpeg,jpg,png,gif|max:10000',
            'diforce_certificate'=>'mimes:pdf,jpeg,jpg,png,gif|max:10000',
            'status_id'=>'image|max:1024'   
        ];
    }
}
