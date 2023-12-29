<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Titulo' => 'required|string|max:255',
            'Editora' => 'required|string|max:255',
            'Edicao' => 'required|integer',
            'AnoPublicacao' => 'required|string|size:4',
            'Valor' => 'required',
            'autores' => 'required|array',
            'autores.*' => 'exists:Autor,CodAu',
            'assuntos' => 'required|array',
            'assuntos.*' => 'exists:Assunto,CodAs',
        ];
    }
}
