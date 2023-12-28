<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Autor;

interface AutorRepositoryInterface
{
    public function save(Autor $autor);
    public function all();
    public function find($id);
    public function update(Autor $autor, array $dados);
    public function delete(Autor $autor);
}
