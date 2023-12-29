<?php

namespace App\Application;

use App\Domain\Repositories\AssuntoRepositoryInterface;
use App\Domain\Models\Assunto;
use Illuminate\Support\Facades\Log;

class AssuntoService
{
    protected $assuntoRepository;

    public function __construct(AssuntoRepositoryInterface $assuntoRepository)
    {
        $this->assuntoRepository = $assuntoRepository;
    }

    public function getAllAssuntos()
    {
        return $this->assuntoRepository->all();
    }

    public function addAssunto($dadosAssunto)
    {
        try {
            $assunto = new Assunto($dadosAssunto);
            $assunto->save();
        } catch (\Exception $e) {
            Log::error('Error saving assunto', ['Error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function getAssuntoById($id)
    {
        return $this->assuntoRepository->find($id);
    }

    public function updateAssunto($id, $dadosAssunto)
    {
        $assunto = $this->assuntoRepository->find($id);
        $assunto->update($dadosAssunto);
    }

    public function deleteAssunto($id)
    {
        $assunto = $this->assuntoRepository->find($id);
        $assunto->delete();
    }
}
