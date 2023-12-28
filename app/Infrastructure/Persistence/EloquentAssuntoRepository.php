<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\AssuntoRepositoryInterface;
use App\Domain\Models\Assunto;

class EloquentAssuntoRepository implements AssuntoRepositoryInterface
{
    public function save(Assunto $assunto)
    {
        $assunto->save();
    }

    public function all()
    {
        return Assunto::all();
    }

    public function find($id)
    {
        return Assunto::find($id);
    }

    public function update(Assunto $assunto, array $dados)
    {
        $assunto->update($dados);
    }

    public function delete(Assunto $assunto)
    {
        $assunto->delete();
    }
}
