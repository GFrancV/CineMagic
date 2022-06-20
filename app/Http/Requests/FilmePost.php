<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmePost extends FormRequest
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
            'titulo' =>         'required|string',
            'trailer_url' =>    'required|string|url',
            'genero_code' =>    'required|string',
            'ano' =>            'required|numeric|digits:4',
            'sumario' =>        'required|string|max:255',
            'cartaz_url' =>     'nullable|image|max:8192'
        ];
    }
}
