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
        $this->defaultLatLong();
        $this->removeFormatCurrency();
        return parent::getValidatorInstance();
    }

    /**
     * Remove format of currency
     * 
     * @return void
     */
    public function removeFormatCurrency()
    {
        $requests = $this->all();

        foreach ($requests as $key => $request) {
            // Remove currency format
            if (in_array($key, $this->currency)) {
                $requests[$key] = str_replace('.', '', str_replace(',', '.', $request));
            }
        }

        $this->replace($requests);
    }

    /**
     * Set default Latitude or Longitude
     * 
     * @return void
     */
    public function defaultLatLong()
    {
        if ($this->has('latitude') || $this->has('longitude')) {
            $this->merge([
                'latitude' => $this->get('latitude', '-6.2773'),
                'longitude' => $this->get('longitude', '106.66101')
            ]);
        }
    }
}
