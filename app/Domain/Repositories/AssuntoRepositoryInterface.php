<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Assunto;

interface AssuntoRepositoryInterface
{
    public function save(Assunto $assunto);
    public function all();
    public function find($id);
    public function update(Assunto $assunto, array $dados);
    public function delete(Assunto $assunto);
}
