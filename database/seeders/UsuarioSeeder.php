<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
