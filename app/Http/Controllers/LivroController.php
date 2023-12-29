<?php

namespace App\Http\Controllers;

use App\Domain\Models\Livro;
use App\Application\LivroService;
use App\Domain\Models\Autor;
use App\Domain\Models\Assunto;
use App\Http\Requests\LivroRequest;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $livros = Livro::with(['autores', 'assuntos'])
            ->when($search, function ($query, $search) {
                return $query->where('Titulo', 'like', '%' . $search . '%');
            })->get();
        return view('livros.index', compact('livros', 'search'));
    }


    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();
        return view('livros.create', compact('autores', 'assuntos'));
    }

    public function store(LivroRequest $request, LivroService $livroService)
    {
        try {
            $dadosLivro = $request->validated();

            $anoPublicacao = substr($dadosLivro['AnoPublicacao'], 0, 4);
            $dadosLivro['AnoPublicacao'] = $anoPublicacao;

            $autoresIds = $request->input('autores', []);
            $assuntosIds = $request->input('assuntos', []);

            $livroService->addLivro($dadosLivro, $autoresIds, $assuntosIds);

            return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('livros.index')->with('error', 'Falha ao salvar o livro: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        $livro = $this->livroService->getLivroById($id);
        return view('livros.show', compact('livro'));
    }

    public function edit($id)
    {
        $livro = $this->livroService->getLivroById($id);
        $autores = Autor::all();
        $assuntos = Assunto::all();
        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(LivroRequest $request, LivroService $livroService, $id)
    {
        try {
            $dadosLivro = $request->validated();
            $autoresIds = $request->input('autores', []);
            $assuntosIds = $request->input('assuntos', []);

            $livroService->updateLivro($id, $dadosLivro, $autoresIds, $assuntosIds);

            return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('livros.index')->with('error', 'Erro ao atualizar o livro: ' . $e->getMessage());
        }
    }


    public function destroy($id, LivroService $livroService)
    {
        try {
            $livroService->deleteLivro($id);
            return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('livros.index')->with('error', 'Erro ao excluir o livro: ' . $e->getMessage());
        }
    }
}
