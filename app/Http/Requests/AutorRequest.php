<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Nome' => 'required|string|max:255|unique:Autor,Nome',
        ];
    }

    public function messages()
    {
        return [
            'Nome.unique' => 'Um autor com este nome já existe.',
        ];
    }
}
