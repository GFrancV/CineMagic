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
            'cliente_id' =>             'required',
            'data' =>                   'required|date_format:Y-m-d',
            'preco_total_sem_iva' =>    'required',
            'iva' =>                    'required',
            'preco_total_com_iva' =>    'required',
            'nif' =>                    'nullable|digits:9',
            'nome_cliente' =>           'required|string',
            'tipo_pagamento' =>         'required|in:VISA,MBWAY,PAYPAL',
            'ref_pagamento' =>          'required',
            'lugar_id' =>               'required',
            'sessao_id' =>              'required',
            'nPlaces' =>                'required'
        ];
    }
}
