<?php

namespace App\Livewire\Components\AdminTables;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BaseTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'date_changed' => 'dateChanged'
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function dateChanged($mode, $column, $operator, $value)
    {
        $this->resetPage();
        if ($mode === 'single') {
            $dates = Carbon::createFromFormat('d-m-Y', $value[0])->format('Y-m-d');
            $this->filters['date'] = [
                'mode' => $mode,
                'column' => $column,
                'operator' => $operator,
                'value' => $dates
            ];
        } elseif ($mode === 'range' && count($value) === 2) {
            $dates = [
                Carbon::createFromFormat('d-m-Y', $value[0])->startOfDay()->format('Y-m-d H:i:s'),
                Carbon::createFromFormat('d-m-Y', $value[1])->endOfDay()->format('Y-m-d H:i:s')
            ];
            $this->filters['date'] = [
                'mode' => $mode,
                'column' => $column,
                'operator' => $operator,
                'value' => $dates
            ];
        }
    }

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
        'page' => ['except' => 1, 'as' => 'p'],
    ];
}
