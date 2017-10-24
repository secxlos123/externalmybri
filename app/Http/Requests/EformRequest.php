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
        return [
            'developer'         => 'required',
            'property'          => 'required',
            // 'property_type'     => 'required_if:developer,1',
            // 'property_item'     => 'required_if:developer,1',
            'price'             => 'required',
            'building_area'     => 'required',
            'home_location'     => 'required',
            'year'              => 'required',
            'active_kpr'        => 'required',
            'dp'                => 'required',
            'category'          => 'required',
            'product_type'      => 'required',
            'status_property'   => 'required',
            'appointment_date'  => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
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
        return [
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
            'phone'             => 'required|numeric|digits_between:9,16',
            'mobile_phone'      => 'required|numeric|digits_between:9,16',
            'mother_name'       => 'required',
            'identity'          => 'required|image|max:1024',
            'couple_nik'        => 'required_if:status,2|numeric|digits:16',
            'couple_name'       => 'required_if:status,2',
            'couple_birth_date' => 'required_if:status,2',
            'couple_identity'   => 'required_if:status,2|image|max:1024',
            'couple_birth_place_id' => 'required_if:status,2',
        ];
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
            'work_year'         => 'required_if:selector,0',
            'work_mount'        => 'required_if:selector,0',
            'office_address'    => 'required_if:selector,0',
            'salary'            => 'required_if:selector,0',
            'other_salary'      => 'required_if:selector,0',
            'loan_installment'  => 'required_if:selector,0',
            'dependent_amount'  => 'required_if:selector,0',
            'emergency_name'    => 'required_if:selector,0',
            'emergency_contact' => 'required_if:selector,0|numeric|digits_between:9,16',
            'emergency_relation'=> 'required_if:selector,0',
            'salary_couple'     => 'required_with:is_join',
            'other_salary_couple' => 'required_with:is_join',
            'loan_installment_couple' => 'required_with:is_join',
        ];
    }
}
