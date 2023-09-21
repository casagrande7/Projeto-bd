<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UsuarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'cpf' => 'required|max:11|min:11|unique:usuarios,cpf',
            'contato' => 'required|max:15|min:10',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()

        ]));
    }

        public function messages(){
            return [
                'nome.required' => 'Nome é obrigatório',
                'nome.max' => 'O campo nome deve conter no máximo 80 caracteres',
                'nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',
                'cpf.required' => 'CPF é obrigatório',
                'cpf.max' => 'O CPF deve conter no máximo 11 caracteres',
                'cpf.min' => 'O CPF deve conter no mínimo 11 caracteres',
                'cpf.unique'=> 'CPF já cadastrado no sistema',
                'contato.required' => 'Cellphone é obrigatório',
                'contato.max' => 'O campo cellphone deve conter no máximo 15 caracteres',
                'contato.min' => 'O campo cellphone deve conter no mínimo 10 caracteres',
                'email.required' => 'Email é obrigatório',
                'email.unique' => 'Email já cadastrado no sistema',
                'password.required'=> 'Password é obrigatório'

            ];
        }
    }

