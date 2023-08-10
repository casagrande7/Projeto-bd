<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(Request $request){
        $usuario = Usuario::create([
            'nome' => $request ->nome,
            'cpf' => $request ->cpf,
            'cellphone' => $request ->cellphone,
            'email' => $request ->email,
            'password' => Hash::make($request->password)

        ]); 
        return response()->json([
            "sucess" => true, 
            "message" => "Registered User",
            "data" => $usuario 
        ], 200);
    }
}
