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
            'name' => 'required',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar o Nome do Vendedor.',
            'email.required' => 'É necessário informar o Email do Vendedor.'
        ];
    }
}
