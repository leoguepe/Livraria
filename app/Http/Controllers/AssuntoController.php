<?php

namespace App\Http\Controllers;

use App\Domain\Models\Assunto;
use App\Application\AssuntoService;
use App\Http\Requests\AssuntoRequest;
use Illuminate\Http\Request;
use App\Http\Requests\LivroRequest;
use App\Application\LivroService;
use Illuminate\Support\Facades\Log;

class AssuntoController extends Controller
{
    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $assuntos = Assunto::when($search, function ($query, $search) {
            return $query->where('Descricao', 'like', '%' . $search . '%');
        })->get();

        return view('assuntos.index', compact('assuntos', 'search'));
    }

    public function create()
    {
        return view('assuntos.create');
    }



    public function store(LivroRequest $request)
    {
        try {
            // Aqui você pode passar os dados do livro, incluindo IDs de autores e assuntos
            $this->livroService->addLivro($request->validated(), $request->autores, $request->assuntos);
            return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Error in Store Method for Livro', ['Error' => $e->getMessage()]);
            return redirect()->route('livros.index')->with('error', 'Falha ao salvar o livro: ' . $e->getMessage());
        }
    }

    public function show(Assunto $assunto)
    {
        return view('assuntos.show', compact('assunto'));
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(AssuntoRequest $request, $id, AssuntoService $assuntoService)
    {
        try {
            $assuntoService->updateAssunto($id, $request->validated());
            return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Error in Update Method', ['Error' => $e->getMessage(), 'AssuntoId' => $id]);
            return redirect()->route('assuntos.index')->with('error', 'Falha ao atualizar o assunto.');
        }
    }

    public function destroy($id, AssuntoService $assuntoService)
    {
        try {
            $assuntoService->deleteAssunto($id);
            return redirect()->route('assuntos.index')->with('success', 'Assunto excluído com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro ao excluir assunto', ['Error' => $e->getMessage(), 'AssuntoId' => $id]);
            return redirect()->route('assuntos.index')->with('error', 'Falha ao excluir o assunto.');
        }
    }
}
