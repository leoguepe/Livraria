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

    public function addLivro($dadosLivro, $autoresIds, $assuntosIds)
    {
        $livro = new Livro($dadosLivro);
        $livro->save();
        $livro->autores()->sync($autoresIds);
        $livro->assuntos()->sync($assuntosIds);
    }


    public function getLivroById($id)
    {
        return $this->livroRepository->find($id);
    }

    public function updateLivro($id, $dadosLivro, $autoresIds, $assuntosIds)
    {
        $livro = $this->livroRepository->find($id);
        $livro->update($dadosLivro);
        $livro->autores()->sync($autoresIds);
        $livro->assuntos()->sync($assuntosIds);
    }


    public function deleteLivro($id)
    {
        $livro = $this->livroRepository->find($id);
        if (!$livro) {
            throw new \Exception("Livro não encontrado.");
        }
        $livro->delete();
    }
}
