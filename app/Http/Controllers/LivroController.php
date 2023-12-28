<?php

namespace App\Http\Controllers;

use App\Application\LivroService;
use App\Http\Requests\LivroRequest;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index()
    {
        $livros = $this->livroService->getAllLivros();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(LivroRequest $request)
    {
        $this->livroService->addLivro($request->validated());
        return redirect()->route('livros.index');
    }

    public function show($id)
    {
        $livro = $this->livroService->getLivroById($id);
        return view('livros.show', compact('livro'));
    }

    public function edit($id)
    {
        $livro = $this->livroService->getLivroById($id);
        return view('livros.edit', compact('livro'));
    }

    public function update(LivroRequest $request, $id)
    {
        $this->livroService->updateLivro($id, $request->validated());
        return redirect()->route('livros.index');
    }

    public function destroy($id)
    {
        $this->livroService->deleteLivro($id);
        return redirect()->route('livros.index');
    }
}
