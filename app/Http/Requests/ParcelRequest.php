<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
    public function rules(): array
    {
        return [
            'weight'      => 'required|numeric',
            'length'      => 'required|numeric',
            'width'       => 'required|numeric',
            'height'      => 'required|numeric',
            'description' => 'required|string|max:255',
            'cost'        => 'required|numeric',
        ];
    }
}
