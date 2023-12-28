<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuntoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descricao' => 'required|string|max:255',
        ];
    }
}
