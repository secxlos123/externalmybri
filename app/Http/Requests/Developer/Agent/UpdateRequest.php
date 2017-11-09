<?php

namespace App\Http\Requests\Developer\Agent;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(
            parent::rules(), ['photo' => 'image|max:1024']
        );
    }
}
