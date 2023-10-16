<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BuilderMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->searchMacro();
    }

    /**
     * Model search macro
     * 
     * @see https://github.com/signifly/laravel-builder-macros/blob/master/src/macros/whereLike.php
     *
     * @return void
     */
    private function searchMacro(): void
    {
        Builder::macro('search', function ($columns, string $value) {
            /** @var Builder $this */
            return $this->where(function (Builder $query) use ($columns, $value) {
                foreach (Arr::wrap($columns) as $column) {
                    $query->when(
                        Str::contains($column, '.'),
                        function (Builder $query) use ($column, $value) {
                            $parts = explode('.', $column);
                            $relationColumn = array_pop($parts);
                            $relationName = join('.', $parts);
        
                            return $query->orWhereHas(
                                $relationName,
                                function (Builder $query) use ($relationColumn, $value) {
                                    $query->where($relationColumn, 'LIKE', "%{$value}%");
                                }
                            );
                        },
                        function (Builder $query) use ($column, $value) {
                            return $query->orWhere($column, 'LIKE', "%{$value}%");
                        }
                    );
                }
            });
        });
    }
}
