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
        for($i =0; $i<400; $i++){
            Usuario::create([
                'nome' => 'João Pedro'.$i,
                'cpf' => rand(00000000001, 99999999999),
                'contato' => '11112222221',
                'email' => 'joao' .$i. '@gmail.com.br',
                'password' => Hash::make('123456')

        ]); 
    }
    }
}
