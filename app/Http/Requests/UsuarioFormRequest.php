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
            'Nome' => 'required|max:80|min:5',
            'CPF' => 'required|max:11|min:11|unique:usuarios,cpf',
            'Contato' => 'required|max:15|min:10',
            'Email' => 'required|email|unique:usuarios,email',
            'Password' => 'required'
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
                'Nome.required' => 'Nome é obrigatório',
                'Nome.max' => 'O campo nome deve conter no máximo 80 caracteres',
                'Nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',
                'CPF.required' => 'CPF é obrigatório',
                'CPF.max' => 'O CPF deve conter no máximo 11 caracteres',
                'CPF.min' => 'O CPF deve conter no mínimo 11 caracteres',
                'CPF.unique'=> 'CPF já cadastrado no sistema',
                'Contato.required' => 'Cellphone é obrigatório',
                'Contato.max' => 'O campo cellphone deve conter no máximo 15 caracteres',
                'Contato.min' => 'O campo cellphone deve conter no mínimo 10 caracteres',
                'Email.required' => 'Email é obrigatório',
                'Email.unique' => 'Email já cadastrado no sistema',
                'Password.required'=> 'Password é obrigatório'

            ];
        }
    }

