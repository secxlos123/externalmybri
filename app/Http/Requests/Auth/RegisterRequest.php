<?php

namespace App\Http\Requests\Auth;

use App\Classes\Traits\Profileble;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use Profileble;

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
        if ( ! $this->profile() ) {
            return $this->registerRules();
        }

        if ( ! $this->profile()['is_simple'] ) {
            return $this->simpleRules();
        }

        if ( ! $this->profile()['is_completed'] ) {
            return $this->completeRules();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function simpleRules()
    {
        return $this->personal();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function completeRules()
    {
        return $this->personalComplete();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function registerRules()
    {
        return [
            'email' => 'required|email',
            'fullname' => 'required|string|min:4',
            'phone' => 'nullable|string|regex:/^[0-9]+$/|digits_between:9,16',
            'password' => 'required|confirmed|min:8'
        ];
    }

    /**
     * Get the validation rules for personal data
     *
     * @return array
     */
    public function personal()
    {
        return [
            'personal.nik'              => 'required|numeric|digits:16',
            'personal.first_name'       => 'required',
            'personal.mobile_phone'     => 'required|numeric|digits:12',
            'personal.birth_place_id'   => 'required',
            'personal.birth_date'       => 'required|date',
            'personal.address'          => 'required',
            'personal.city_id'          => 'required',
            'personal.gender'           => 'required|in:L,P',
            'personal.citizenship_id'   => 'required',
            'personal.status'           => 'required|in:0,1,2',
            'personal.address_status'   => 'required|in:menetap,sementara',
            'personal.mother_name'      => 'required',
            'personal.identity'         => 'required|image|max:1024',
            'personal.couple_nik'       => 'required_if:personal.status,1|numeric|digits:16',
            'personal.couple_name'      => 'required_if:personal.status,1',
            'personal.couple_birth_place_id'    => 'required_if:personal.status,1',
            'personal.couple_birth_date'        => 'required_if:personal.status,1|date',
            'personal.couple_identity'          => 'required_if:personal.status,1|image|max:1024',
        ];
    }

    /**
     * Get the validation rules for personal data
     *
     * @return array
     */
    public function personalComplete()
    {
        return [
            'personal.nik'              => 'required|numeric|digits:16',
            'personal.first_name'       => 'required',
            'personal.mobile_phone'     => 'required|numeric|digits:12',
            'personal.birth_place_id'   => 'required',
            'personal.birth_date'       => 'required|date',
            'personal.address'          => 'required',
            'personal.city_id'          => 'required',
            'personal.gender'           => 'required|in:L,P',
            'personal.citizenship_id'   => 'required',
            'personal.status'           => 'required|in:0,1,2',
            'personal.address_status'   => 'required|in:menetap,sementara',
            'personal.mother_name'      => 'required',
            'personal.identity'         => 'required|image|max:1024',
            'personal.couple_nik'       => 'required_if:personal.status,1|numeric|digits:16',
            'personal.couple_name'      => 'required_if:personal.status,1',
            'personal.couple_birth_place_id'    => 'required_if:personal.status,1',
            'personal.couple_birth_date'        => 'required_if:personal.status,1|date',
            'personal.couple_identity'          => 'required_if:personal.status,1|image|max:1024',
            'work_type'                          => 'required',
            'work'                              => 'required',
            'company_name'                      => 'required',
            'work_field'                        => 'required',
            'position'                          => 'required',
            'work_duration'                     => 'required',
            'office_address'                    => 'required',
            'salary'                            => 'required|numeric',
            'other_salary'                      => 'required|numeric',
            'loan_installment'                  => 'required|numeric',
            'dependent_amount'                  => 'required|numeric',
            'phone'                             => 'required|numeric',
            'mobile_phone'                      => 'required|numeric|digits:12',
            'emergency_contact'                 => 'required|numeric|digits:12',
            'emergency_relation'                => 'required',
            'npwp'                              => 'required|image|max:1024',
            'image'                          => 'required|image|max:1024'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $personal = [];

        foreach ($this->personal() as $attribute => $value) {
            $lang = str_replace('personal.', '', $attribute);
            $personal[$attribute] = strtolower( trans("customer.personal.{$lang}") );
        }

        return $personal;
    }
}
