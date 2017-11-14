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
            'npwp'         => 'image|max:1024',
            'family_card'  =>'image|max:1024',
            'couple_identity'=>'image|max:1024',
            'marrital_certificate'=>'image|max:1024',
            'diforce_certificate'=>'image|max:1024',
            'status_id'=>'image|max:1024'   
        ];
    }
}
