<?php

namespace App\Http\Requests\Developer\Property;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name'      => 'required',
            'city_id'   => 'required',
            'category'  => 'required|in:0,1,2',
            'pic_name'  => 'required',
            'pic_phone' => 'required|string|regex:/^[0-9]+$/|min:9|max:16',
            'photo'     => 'required|image|max:1024',
            'address'   => 'required',
            'latitude'  => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'facilities'  => 'required',
        ];
    }
}
