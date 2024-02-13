<?php

namespace App\Livewire\Components\AdminTables;

use Illuminate\Contracts\View\View;

class StocksTable extends BaseTable
{
    public $availabilities = [
        'lt_150',
        'lt_100',
        'lt_50',
    ];
    public $prices = [
        'asc',
        'desc',
    ];
    public $selected_availability = null;
    public $selected_price = null;

    protected $listeners = [
        'quantity-updated' => '$refresh'
    ];
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
            ->when($this->selected_availability, function ($query) {
                $amount = explode('lt_', $this->selected_availability)[1];
                return $query->where('stocks.quantity', '<=', $amount);
            })
            ->when($this->selected_price, function ($query) {
                return $query->join('country_product', 'country_product.product_id', '=', 'stocks.product_id')
                    ->where('country_id', auth()->user()->country_id)
                    ->orderBy('country_product.price', $this->selected_price);
            })
            ->search($this->search, [
                'product.name',
                'productVariant.sku'
            ])
            ->orderBy('stocks.product_id')
        ;

        return view('livewire.components.admin-tables.stocks-table', [
            'stocks' => $stocks->paginate(),
        ]);
    }
}
