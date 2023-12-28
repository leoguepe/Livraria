<?php

namespace App\Application;

use App\Domain\Repositories\LivroRepositoryInterface;
use App\Domain\Models\Livro;

class LivroService
{
    protected $livroRepository;

    public function __construct(LivroRepositoryInterface $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function getAllLivros()
    {
        return $this->livroRepository->all();
    }

    public function addLivro($dadosLivro)
    {
        $livro = new Livro($dadosLivro);
        $this->livroRepository->save($livro);
    }

    public function getLivroById($id)
    {
        return $this->livroRepository->find($id);
    }

    public function updateLivro($id, $dadosLivro)
    {
        $livro = $this->livroRepository->find($id);
        $livro->update($dadosLivro);
    }

    public function deleteLivro($id)
    {
        $livro = $this->livroRepository->find($id);
        $livro->delete();
    }
}
