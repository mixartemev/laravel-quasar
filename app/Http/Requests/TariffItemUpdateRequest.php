<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffItemUpdateRequest extends FormRequest
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
            'tariff_id' => 'required|integer|exists:tariffs,id',
            'level' => 'integer',
            'percent' => 'required|numeric|gt:0|between:0,9.999',
        ];
    }
}
