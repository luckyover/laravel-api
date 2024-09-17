<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * interface
 */


use App\Repositories\MessageInterface;

/**
 * mysql
 */

use App\Repositories\api\MessageRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Application repository
         */
        $this->app->bind(MessageInterface::class, MessageRepository::class);

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
