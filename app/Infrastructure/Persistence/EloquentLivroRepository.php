<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\LivroRepositoryInterface;
use App\Domain\Models\Livro;

class EloquentLivroRepository implements LivroRepositoryInterface
{
    public function save(Livro $livro)
    {
        $livro->save();
    }

    public function all()
    {
        return Livro::all();
    }

    public function find($id)
    {
        return Livro::find($id);
    }
}
