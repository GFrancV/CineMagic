<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function edit($user){
        $cliente = Cliente::find($user);
        $user = User::find($user);

        return view('user.edit', ['cliente' => $cliente, 'user' => $user]);
    }
}
