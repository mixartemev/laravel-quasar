<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'market_type' => 'required|integer',
            'deposit' => 'required|integer',
            'min' => 'integer',
            'min_condition' => 'integer',
        ];
    }
}
