<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:sellers',
            'email' => 'required|unique:sellers'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar o Nome do Vendedor.',
            'email.required' => 'É necessário informar o Email do Vendedor.',
            'email.unique' => 'Esse email já existe',
            'name.unique' => 'Esse nome já existe'
        ];
    }
}
