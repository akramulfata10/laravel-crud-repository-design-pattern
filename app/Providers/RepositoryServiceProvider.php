<?php

namespace App\Providers;

use App\Interfaces\PostInterface;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        // Bind Interface and Repository class together
        $this->app->bind(PostInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}