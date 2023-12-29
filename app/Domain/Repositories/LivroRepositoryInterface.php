<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Livro;

interface LivroRepositoryInterface
{
    public function save(Livro $livro);
    public function all();
    public function find($id);
    public function update(Livro $livro, array $dados);
    public function delete(Livro $livro);
}
