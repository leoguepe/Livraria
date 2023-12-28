<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\LivroRepositoryInterface;
use App\Infrastructure\Persistence\EloquentLivroRepository;
use App\Domain\Repositories\AutorRepositoryInterface;
use App\Infrastructure\Persistence\EloquentAutorRepository;
use App\Domain\Repositories\AssuntoRepositoryInterface;
use App\Infrastructure\Persistence\EloquentAssuntoRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LivroRepositoryInterface::class, EloquentLivroRepository::class);
        $this->app->bind(AutorRepositoryInterface::class, EloquentAutorRepository::class);
        $this->app->bind(AssuntoRepositoryInterface::class, EloquentAssuntoRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
