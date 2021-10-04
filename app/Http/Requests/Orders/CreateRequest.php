<?php

namespace App\Http\Requests\Orders;

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
           
        ];
    }

    public function getOriginalLat()
    {
        return $this->original_coordinates['lat'];
    }

    public function getOriginalLng()
    {
        return $this->original_coordinates['lng'];
    }

    public function getDestinationLat()
    {
        return $this->destination_coordinates['lat'];
    }

    public function getDestinationLng()
    {
        return $this->destination_coordinates['lng'];
    }
}