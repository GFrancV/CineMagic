<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Bilhete;
use Illuminate\Http\Request;
use App\Http\Requests\ReciboPost;
use Illuminate\Support\Facades\Storage;


class ReciboController extends Controller
{
    public function store(ReciboPost $request){
        //Create recibo
        $validated_info = $request->validated();
        $newRecibo = new Recibo;
        $newRecibo->cliente_id = $validated_info['cliente_id'];
        $newRecibo->data = $validated_info['data'];
        $newRecibo->preco_total_sem_iva = $validated_info['preco_total_sem_iva'];
        $newRecibo->iva = $validated_info['iva'];
        $newRecibo->preco_total_com_iva = $validated_info['preco_total_com_iva'];
        $newRecibo->nif = $validated_info['nif'];
        $newRecibo->nome_cliente = $validated_info['nome_cliente'];
        $newRecibo->tipo_pagamento = $validated_info['tipo_pagamento'];
        $newRecibo->ref_pagamento = $validated_info['ref_pagamento'];
        $newRecibo->save();

        //Create bilhete
        $newBilhete = new Bilhete;
        $newBilhete->recibo_id = $newRecibo->id;
        $newBilhete->cliente_id = $validated_info['cliente_id'];
        $newBilhete->sessao_id = $validated_info['sessao_id'];
        $newBilhete->lugar_id = $validated_info['lugar_id'];
        $newBilhete->preco_sem_iva = $validated_info['preco_total_sem_iva'];
        $newBilhete->estado = 'não usado';
        $newBilhete->save();

        return $request->all();
    }
}
