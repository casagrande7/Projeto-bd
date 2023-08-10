<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(UsuarioFormRequest $request){
        $usuario = Usuario::create([
            'nome' => $request ->nome,
            'cpf' => $request ->cpf,
            'cellphone' => $request ->cellphone,
            'email' => $request ->email,
            'password' => Hash::make($request->password)

        ]); 
        return response()->json([
            "success" => true, 
            "message" => "Usuario cadastrado com sucesso",
            "data" => $usuario 
        ], 200);
    }
}
