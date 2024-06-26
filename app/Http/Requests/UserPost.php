<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>   'required|string',
            'foto_url' => 'nullable|image|max:8192',
            'nif' => 'digits:9',
            'tipo_pagamento' => 'in:VISA,MBWAY,PAYPAL',
            'ref_pagamento' => 'numeric'
        ];
    }
}
