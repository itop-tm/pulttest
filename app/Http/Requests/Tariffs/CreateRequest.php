<?php

namespace App\Http\Requests\Tariffs;

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
            'name'                      => 'required|min:3|max:100',
            'minimal_cost'              => 'required|numeric|min:100|max:1000',
            'cost_per_km'               => 'required|numeric|min:1|max:100',
            'cost_per_minute'           => 'required|numeric|min:1|max:100',
            'number_of_free_kilometers' => 'required|numeric|min:1|max:5',
            'number_of_free_minutes'    => 'required|numeric|min:1|max:10',
        ];
    }
}