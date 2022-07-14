<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'price' => 'required|numeric|min:0.1',
            'seller_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'É necessário informar o valor da venda',
            'price.min' => 'Informe um valor maior que 0',
            'seller_id.required' => 'É necessário informar o vendedor.'
        ];
    }


}
