<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Utility\Log\Facades\Log;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {



        DB::listen(function ($query) {
            // Replace the placeholders with actual values
            $sql = $query->sql;
            $bindings = $query->bindings;

            foreach ($bindings as $binding) {
                // Escape special characters to avoid breaking the SQL syntax
                if (is_string($binding)) {
                    $binding = '"' . addslashes($binding) . '"';
                } elseif (is_null($binding)) {
                    $binding = 'NULL';
                }

                // Replace the first occurrence of ? with the binding value
                $sql = preg_replace('/\?/', $binding, $sql, 1);
            }

            $logMessage = sprintf(
                'Query Time: %s ms | Query: %s',
                number_format($query->time, 2),
                $sql
            );

            // Log the formatted query message
            Log::insert('database_log', 'debug',$logMessage);
        });

    }
}
