<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Models\Autor;
use App\Domain\Models\Livro;
use App\Domain\Models\Assunto;
use Illuminate\Support\Facades\DB;
use PDF;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $autoresList = Autor::pluck('Nome', 'CodAu');
        $editorasList = Livro::select('Editora')->distinct()->pluck('Editora', 'Editora');
        $assuntosList = Assunto::pluck('Descricao', 'CodAs');

        $titulo = $request->input('titulo');
        $editora = $request->input('editora');
        $autorSelecionado = $request->input('autores');
        $assuntoSelecionado = $request->input('assuntos');

        $filtrosAplicados = [
            'titulo' => $titulo,
            'editora' => $editora,
            'autores' => $autorSelecionado,
            'assuntos' => $assuntoSelecionado
        ];

        $relatorios = collect();

        if ($titulo || $editora || $autorSelecionado || $assuntoSelecionado) {
            $relatorios = DB::table('relatorio_livros')
                ->when($titulo, function ($query, $titulo) {
                    return $query->where('Titulo', 'like', '%' . $titulo . '%');
                })
                ->when($editora, function ($query, $editora) {
                    return $query->where('Editora', 'like', '%' . $editora . '%');
                })
                ->when($autorSelecionado, function ($query, $autorSelecionado) {
                    return $query->where('Autores', 'like', '%' . $autorSelecionado . '%');
                })
                ->when($assuntoSelecionado, function ($query, $assuntoSelecionado) {
                    return $query->where('Assuntos', 'like', '%' . $assuntoSelecionado . '%');
                })
                ->get();
        }

        return view('relatorios.index', compact('relatorios', 'autoresList', 'editorasList', 'assuntosList', 'filtrosAplicados'));
    }

    public function download(Request $request)
    {
        $titulo = $request->input('titulo');
        $editora = $request->input('editora');
        $autorSelecionado = $request->input('autores');
        $assuntoSelecionado = $request->input('assuntos');

        $relatorios = DB::table('relatorio_livros')
            ->when($titulo, function ($query, $titulo) {
                return $query->where('Titulo', 'like', '%' . $titulo . '%');
            })
            ->when($editora, function ($query, $editora) {
                return $query->where('Editora', 'like', '%' . $editora . '%');
            })
            ->when($autorSelecionado, function ($query, $autorSelecionado) {
                return $query->where('Autores', 'like', '%' . $autorSelecionado . '%');
            })
            ->when($assuntoSelecionado, function ($query, $assuntoSelecionado) {
                return $query->where('Assuntos', 'like', '%' . $assuntoSelecionado . '%');
            })
            ->get();

        $pdf = PDF::loadView('relatorios.pdf', compact('relatorios'));
        return $pdf->download('relatorio_livros.pdf');
    }
}
