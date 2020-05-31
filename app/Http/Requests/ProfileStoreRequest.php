<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'code' => 'required|string|max:15',
            'title' => 'required|string',
            'market_type' => 'required|integer',
            'tariff_id' => 'required|integer|exists:tariffs,id',
            'user_id' => 'required|integer',
        ];
    }
}
