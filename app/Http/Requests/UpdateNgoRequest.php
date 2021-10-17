<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNgoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:30',
            'phone'=>'unique:donors,phone',
            'location'=> 'required|max:100|min:10',
            'address_latitude'=>'min:9|max:20',
            'address_longitude'=>'min:9|max:20',
        ];
    }
}
