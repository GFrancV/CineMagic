<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\UserPost;
use Illuminate\Support\Facades\Storage;

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

    public function update(UserPost $request, User $user){
        $validated_data = $request->validated();
        $user->name = $validated_data['name'];

        if ($request->hasFile('foto_url')) {
            Storage::delete('public/fotos/' . $user->foto_url);
            $path = $request->foto_url->store('public/fotos/');
            $user->foto_url = basename($path);
        }

        $user->save();
        return redirect()->route('user.edit', ['user' => $user])
            ->with('alert-msg', 'User "' . $user->name . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy_foto(User $user){
        Storage::delete('public/storage/fotos/' .  $user->foto_url);
        $user->foto_url = null;
        $user->save();

        return redirect()->route('user.edit', ['user' => $user])
            ->with('alert-msg', 'Foto do usuario  "' . $user->name . '" foi removida!')
            ->with('alert-type', 'success');
    }
}
