<?php

namespace App\Application;

use App\Domain\Repositories\AutorRepositoryInterface;
use App\Domain\Models\Autor;
use Illuminate\Support\Facades\Log;


class AutorService
{
    protected $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function getAllAutores()
    {
        return $this->autorRepository->all();
    }

    public function addAutor($dadosAutor)
    {
        try {
            $autor = new Autor($dadosAutor);
            $autor->save();
        } catch (\Exception $e) {
            Log::error('Error saving autor', ['Error' => $e->getMessage()]);
            throw $e; // Relança a exceção para ser capturada no controlador
        }
    }


    public function getAutorById($id)
    {
        return $this->autorRepository->find($id);
    }

    public function updateAutor($id, $dadosAutor)
    {
        $autor = $this->autorRepository->find($id);
        $autor->update($dadosAutor);
    }

    public function deleteAutor($id)
    {
        $autor = $this->autorRepository->find($id);
        $autor->delete();
    }
}
