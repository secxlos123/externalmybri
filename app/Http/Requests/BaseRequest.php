<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * This currency need to formated
     *
     * @var array
     */
    protected $currency = [
        'price', 'request_amount', 'down_payment', 'salary', 'other_salary', 
        'loan_installment', 'dependent_amount', 'salary_couple', 'other_salary_couple',
        'loan_installment_couple'
    ];

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
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $requests = $this->all();

        foreach ($requests as $key => $request) {

            // Remove currency format
            if (in_array($key, $this->currency)) {
                $requests[$key] = str_replace('.', '', str_replace(',', '.', $request));
            }
        }

        $this->replace($requests);
        return parent::getValidatorInstance();
    }
}
