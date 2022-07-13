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
            'price' => 'required',
            'seller_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'É necessário informar o valor da venda',
            'seller_id.required' => 'É necessário informar o vendedor.'
        ];
    }
}
