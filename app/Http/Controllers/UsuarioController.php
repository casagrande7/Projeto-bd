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
    public function pesquisarPorId($id){
        $usuario = Usuario::find($id);
        if($usuario == null){
            return response()-> json([
                'status' => false,
                'data' => "Usuário não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $usuario

        ]);
    }

    public function pesquisarPorCpf($cpf){
        $usuario = Usuario::where('cpf', '=',$cpf )->first();
        if($usuario == null){
            return response()->json([
                'status' => false,
                'data' => "CPF não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $usuario
        ]);       
    }
    public function retornarTodos(){
        $usuarios = Usuario::all();

        return response()->json([
            'status' => true,
            'data' => $usuarios
        ]);       
    }
}
