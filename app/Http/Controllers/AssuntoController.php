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
    protected $assuntoService;

    public function __construct(LivroService $livroService)
    {
        $this->assuntoService = $livroService;
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



    public function store(AssuntoRequest $request, AssuntoService $assuntoService)
    {
        try {
            $assuntoService->addAssunto($request->validated());
            return redirect()->route('assuntos.index')->with('success', 'Assunto cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Error in Store Method', ['Error' => $e->getMessage()]);
            return redirect()->route('assuntos.index')->with('error', 'Falha ao salvar o assunto.');
        }
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
        $assunto = Assunto::with('livros')->find($id);

        if ($assunto && $assunto->livros->count() > 0) {
            return redirect()->route('assuntos.index')->with('error', 'Não é possível excluir o assunto, pois está vinculado a livros.');
        }

        try {
            $assuntoService->deleteAssunto($id);
            return redirect()->route('assuntos.index')->with('success', 'Assunto excluído com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro ao excluir assunto', ['Error' => $e->getMessage(), 'AssuntoId' => $id]);
            return redirect()->route('assuntos.index')->with('error', 'Falha ao excluir o assunto.');
        }
    }
}
