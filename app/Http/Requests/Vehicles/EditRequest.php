<?php

namespace App\Http\Requests\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'brand'         => 'required|min:3|max:20',
            'model'         => 'required|min:3|max:20',
            'state_number'  => 'required|min:3|max:20',
            'color'         => 'required|min:3|max:20',
            'year_of_issue' => 'required|numeric',
        ];
    }
}