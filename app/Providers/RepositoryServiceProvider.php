<?php

namespace App\Providers;

use App\Interfaces\AdInterface;
use App\Interfaces\TagInterface;
use App\Repositories\AdRepository;
use App\Repositories\TagRepository;
use App\Interfaces\CategoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
        $this->app->bind(AdInterface::class, AdRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
