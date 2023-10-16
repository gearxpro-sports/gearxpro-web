<?php

namespace App\Livewire\Components\AdminTables;


use Livewire\Component;
use Livewire\WithPagination;

class BaseTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    /**
     * @var string
     */
    public string $search = '';

    /**
     * @var array
     */
    public array $filters = [];

    /**
     * @var array
     */
    protected $queryString = [ 
        'search' => ['except' => '', 'as' => 's'],
        'page'   => ['except' => 1, 'as' => 'p'],
    ];
}
