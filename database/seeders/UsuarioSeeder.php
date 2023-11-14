<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nome' => 'João Pedro',
            'cpf' => '11111111111',
            'contato' => '11112222221',
            'email' => 'joao@gmail.com.br',
            'password' => Hash::make('123456')

        ]); 
    }
}
