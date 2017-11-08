<?php

namespace App\Http\Requests\Developer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class FinancialRequest extends FormRequest
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
            'salary'            => 'required|numeric',
            'other_salary'      => 'required|numeric',
            'loan_installment'  => 'required|numeric',
            'dependent_amount'  => 'required|numeric',
        ];
    }
}
