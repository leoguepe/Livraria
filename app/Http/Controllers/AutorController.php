<?php

namespace App\Http\Controllers;

use App\Domain\Models\Autor;
use App\Application\AutorService;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AutorController extends Controller
{
    protected $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $autores = Autor::when($search, function ($query, $search) {
            return $query->where('Nome', 'like', '%' . $search . '%');
        })->get();

        return view('autores.index', compact('autores', 'search'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(AutorRequest $request, AutorService $autorService)
    {
        try {
            $autorService->addAutor($request->validated());
            return redirect()->route('autores.index')->with('success', 'Autor cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Error in Store Method', ['Error' => $e->getMessage()]);
            return redirect()->route('autores.index')->with('error', 'Falha ao salvar o autor.');
        }
    }

    public function show($id)
    {
        $autor = $this->autorService->getAutorById($id);
        return view('autores.show', compact('autor'));
    }

    public function edit($id)
    {
        $autor = $this->autorService->getAutorById($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(AutorRequest $request, $id, AutorService $autorService)
    {
        try {
            $autorService->updateAutor($id, $request->validated());
            return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso.');
        } catch (\Exception $e) {
            Log::error('Error in Update Method', ['Error' => $e->getMessage(), 'AutorId' => $id]);
            return redirect()->route('autores.index')->with('error', 'Falha ao atualizar o autor.');
        }
    }

    public function destroy($id, AutorService $autorService)
    {
        try {
            $autorService->deleteAutor($id);
            return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso.');
        } catch (\Exception $e) {
            Log::error('Erro ao excluir autor', ['Error' => $e->getMessage(), 'AutorId' => $id]);
            return redirect()->route('autores.index')->with('error', 'Falha ao excluir o autor.');
        }
    }
}
