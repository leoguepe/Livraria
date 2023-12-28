<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\AutorRepositoryInterface;
use App\Domain\Models\Autor;

class EloquentAutorRepository implements AutorRepositoryInterface
{
    public function save(Autor $autor)
    {
        $autor->save();
    }

    public function all()
    {
        return Autor::all();
    }

    public function find($id)
    {
        return Autor::find($id);
    }

    public function update(Autor $autor, array $dados)
    {
        $autor->update($dados);
    }

    public function delete(Autor $autor)
    {
        $autor->delete();
    }
}
