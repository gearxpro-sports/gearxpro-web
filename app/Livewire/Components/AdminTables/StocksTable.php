<?php

namespace App\Livewire\Components\AdminTables;

use Illuminate\Contracts\View\View;

class StocksTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $stocks = auth()->user()->stocks()
            ->with(
                [
                    'productVariant' => function($query) {
                        $query->orderBy('product_id')->withoutGlobalScopes();
                    },
                    'productVariant.product.countries' => function($query) {
                        $query->where('country_id', auth()->user()->country_id);
                    },
                ]
            )
            ->orderBy('product_id')
        ;

        return view('livewire.components.admin-tables.stocks-table', [
            'stocks' => $stocks->paginate(),
        ]);
    }
}
