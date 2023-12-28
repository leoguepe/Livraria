<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        $autores = $this->autorService->getAllAutores();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(AutorRequest $request, AutorService $autorService)
    {
        Log::info('Store Method Called', ['Request Data' => $request->all()]);

        try {
            $autorService->addAutor($request->validated());
            return redirect()->route('autores.index');
        } catch (\Exception $e) {
            Log::error('Error in Store Method', ['Error' => $e->getMessage()]);
            // Opcional: retorne uma resposta de erro ou redirecione com uma mensagem de erro
            return back()->with('error', 'Falha ao salvar o autor: ' . $e->getMessage());
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

    public function update(AutorRequest $request, $id)
    {
        $this->autorService->updateAutor($id, $request->validated());
        return redirect()->route('autores.index');
    }

    public function destroy($id)
    {
        $this->autorService->deleteAutor($id);
        return redirect()->route('autores.index');
    }
}
