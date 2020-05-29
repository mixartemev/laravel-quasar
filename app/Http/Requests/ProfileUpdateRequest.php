<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'code' => 'required|string|max:7',
            'name' => 'required|string',
            'commission' => 'required|numeric|between:-9.9999,9.9999',
            'user_id' => 'required|integer',
            'server_id' => 'required|integer|exists:servers,id',
        ];
    }
}
