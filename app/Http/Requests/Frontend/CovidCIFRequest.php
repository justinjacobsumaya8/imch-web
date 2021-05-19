<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CovidCIFRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'permanent_house_number' => 'required',
            'permanent_street_address' => 'required',
            'permanent_municipality' => 'required',
            'permanent_province' => 'required',
            'permanent_region' => 'required',
            'permanent_home_phone_number' => 'required',
            'permanent_cellphone_number' => 'required',
            'permanent_email_address' => 'required',
            'is_returning_ofw' => 'required'
        ];
    }
}
