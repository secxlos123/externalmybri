<?php

namespace App\Http\Requests\Developer\Agent;

use App\Http\Requests\BaseRequest as FormRequest;
use Carbon\Carbon;

class BaseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $month = date('M');

        $now = Carbon::parse('first day of '.$month.'');

        $seventeen_years_from_now = $now->addYears(17);

        $end = Carbon::parse($this->end);
        $start =  Carbon::parse($this->start);

        $diff_in_days = $end->diffInDays($start);

        return [
            'name'          => 'required',
            'email'         => 'required',
            'mobile_phone'  => 'required|numeric',
            'birth_date'    => 'required|date|before:'.$seventeen_years_from_now,
            'join_date'     => 'required|date'
        ];
    }
}
