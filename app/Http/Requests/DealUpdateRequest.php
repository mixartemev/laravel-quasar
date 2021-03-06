<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealUpdateRequest extends FormRequest
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
            'ticker' => 'required|string|max:15',
            'price' => 'required|numeric|gt:0|between:0,9999999.99',
            'profile_id' => 'required|integer|exists:profiles,id',
            'when' => 'required',
        ];
    }
}
