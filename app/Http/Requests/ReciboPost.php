<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReciboPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cliente_id' =>             'required',
            'data' =>                   'required|date_format:Y-m-d',
            'preco_total_sem_iva' =>    'required',
            'iva' =>                    'required',
            'preco_total_com_iva' =>    'required',
            'nif' =>                    'digits:9',
            'nome_cliente' =>           'required',
            'tipo_pagamento' =>         'required',
            'ref_pagamento' =>          'required'
        ];
    }
}
