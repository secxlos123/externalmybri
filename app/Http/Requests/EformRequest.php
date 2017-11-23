<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest as FormRequest;

class EformRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        if (session('authenticate.role') != 'developer-sales') {
            $rules = array_merge(
                $this->rulesCustomerSimple(), $this->rulesCustomerComplete()
            );
        }

        return array_merge( $rules, $this->rulesEform() );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rulesEform()
    {
        if ($this->input('developer')) {
            if ( $this->input('developer') == ENV('DEVELOPER_KEY', 1) ) {
                $property = '';
            } else {
                $property = 'required_unless:developer,1';
            }
        } else {
            $property = '';
        }

        return [
            'developer'         => 'required_if:status_property,1',
            'property'          => $property,
            // 'property_type'     => 'required_if:developer,1',
            // 'property_item'     => 'required_if:developer,1',
            'price'             => 'required',
            'building_area'     => 'required',
            'home_location'     => 'required',
            'year'              => 'required',
            'active_kpr'        => 'required',
            'dp'                => 'required',
            'category'          => 'required_if:status_property,1',
            'product_type'      => 'required',
            'status_property'   => 'required',
            'appointment_date'  => 'required',
            'request_amount'    => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'address_location'  => 'required',
            'branch_id'         => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rulesCustomerSimple()
    {
        if ($this->couple_identity_flag == 1) {
            $rules = [
                'selector'          => 'required',
                'nik'               => 'required|numeric|digits:16',
                'first_name'        => 'required',
                'last_name'         => '',
                'birth_place_id'    => 'required',
                'birth_date'        => 'required|date',
                'address'           => 'required',
                'city_id'           => 'required',
                'gender'            => 'required|in:L,P',
                'citizenship_id'    => 'required',
                'status'            => 'required|in:1,2,3',
                'address_status'    => 'required|in:0,1,3',
                // 'phone'             => 'numeric|digits_between:7,16',
                'mobile_phone'      => 'required|string|regex:/^[0-9]+$/|min:9|max:12',
                'mother_name'       => 'required',
                'couple_nik'        => 'required_if:status,2|numeric|digits:16',
                'couple_name'       => 'required_if:status,2',
                'couple_birth_date' => 'required_if:status,2',
                'couple_birth_place_id' => 'required_if:status,2',
                'identity'          => 'required_if:is_simple,0|image|max:1024',
                'couple_identity'   => 'image|max:1024'
            ];
        }else{
            $rules = [
                'selector'          => 'required',
                'nik'               => 'required|numeric|digits:16',
                'first_name'        => 'required',
                'last_name'         => '',
                'birth_place_id'    => 'required',
                'birth_date'        => 'required|date',
                'address'           => 'required',
                'city_id'           => 'required',
                'gender'            => 'required|in:L,P',
                'citizenship_id'    => 'required',
                'status'            => 'required|in:1,2,3',
                'address_status'    => 'required|in:0,1,3',
                // 'phone'             => 'numeric|digits_between:7,16',
                'mobile_phone'      => 'required|string|regex:/^[0-9]+$/|min:9|max:12',
                'mother_name'       => 'required',
                'couple_nik'        => 'required_if:status,2|numeric|digits:16',
                'couple_name'       => 'required_if:status,2',
                'couple_birth_date' => 'required_if:status,2',
                'couple_birth_place_id' => 'required_if:status,2',
                'identity'          => 'required_if:is_simple,0|image|max:1024',
                'couple_identity'   => 'image|max:1024'
            ];
        }

        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rulesCustomerComplete()
    {
        return [
            'work_field'        => 'required_if:selector,0',
            'work_type'         => 'required_if:selector,0',
            'work'              => 'required_if:selector,0',
            'company_name'      => 'required_if:selector,0',
            'position'          => 'required_if:selector,0',
            'work_duration'     => 'required_if:selector,0',
            'work_duration_month' => 'required_if:selector,0',
            'office_address'    => 'required_if:selector,0',
            'salary'            => 'required_if:selector,0',
            'other_salary'      => 'required_if:selector,0',
            'loan_installment'  => 'required_if:selector,0',
            'dependent_amount'  => 'required_if:selector,0',
            'emergency_name'    => 'required_if:selector,0',
            'emergency_contact' => 'required_if:selector,0|string|regex:/^[0-9]+$/|min:9|max:12',
            'emergency_relation'=> 'required_if:selector,0',
            'couple_salary'     => 'required_with:is_join',
            'couple_other_salary' => 'required_with:is_join',
            'couple_loan_installment' => 'required_with:is_join',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $langs = array_merge_recursive(
            trans('customer.personal'), trans('customer.financial'),
            trans('customer.employee'), trans('customer.contact'), trans('eform')
        );
        $attributes = [];

        foreach ($this->rules() as $key => $rule) {
            if (array_key_exists($key, $langs)) {
                $attributes[$key] = strtolower($langs[$key]);
            }
        }

        return $attributes;
    }
}
