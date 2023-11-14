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
            'contato' => $request ->contato,
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
    public function pesquisaPorNome(Request $request){
        $usuarios = Usuario::where('nome', 'like', '%'. $request->Nome .'%')->get();

        if(count($usuarios)> 0){

        return response()->json([
            'status' => true,
            'data' => $usuarios
        ]);       

    }
    return response()->json([
        'status' => false,
        'message' => 'Não há resultados para pesquisa.'

    ]);
}

public function excluir($id){
    $usuario = Usuario::find($id);

    if(!isset($usuario)){
        return response() -> json([
            'status' => false,
            'message' => "Usuário não encontrado"
        ]);
    }

    $usuario->delete();
    return response() -> json([
        'status' => true,
        'message' => "Usuário excluído com sucesso"
    ]);
}

public function update(Request $request){
    $usuario = Usuario::find($request->id);

    if(!isset($usuario)){
        return response() ->json([
            'status' => false,
            'message' => "Usuário não encontrado"
        ]);
    }
    if(isset($request->nome)){
        $usuario->nome = $request-> nome;
    }

    if(isset($request->cpf)){
        $usuario->cpf = $request -> cpf;
    }

    if(isset($request->contato)){
        $usuario->contato = $request->contato;
    }

    if(isset($request->email)){
        $usuario->email = $request->email;
    }

    $usuario->update();
    return response()-> json([
        'status' => true,
        'message' => "Usuário atualizado"
    ]);
}

public function exportarCsv(){
    $usuarios = Usuario::all();
    
    $nomeArquivo = 'usuarios.csv';
}
}