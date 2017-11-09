<?php

namespace App\Http\Requests\Developer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'type_id'           => 'required',
            'work_id'           => 'required',
            'company_name'      => 'required',
            'position_id'       => 'required',
            'citizenship_id'    => 'required',
            'work_duration_month'   => 'required|numeric',
            'work_duration'     => 'required|numeric',
            'office_address'    => 'required'
        ];
    }
}
