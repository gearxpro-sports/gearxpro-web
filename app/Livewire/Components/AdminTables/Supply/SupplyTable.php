<?php

namespace App\Livewire\Components\AdminTables\Supply;

use App\Livewire\Components\AdminTables\BaseTable;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Supply;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class SupplyTable extends BaseTable
{
    public $supply;
    public $items = [];
    public $amount = 0;
    //    public $prices = [
    //        '0-20',
    //        '21-50',
    //        '51-100',
    //        '100+'
    //    ];
    //    public $availabilities = [
    //        'Disponibile',
    //        'Non disponibile'
    //    ];

    public function mount() {
        $this->supply = auth()->user()->supplies()->where('confirmed', false)->first();

        if($this->supply) {
            foreach ($this->supply->rows as $row) {
                $this->items[$row->product->id] = [
                    'id' => $row->product->id,
                    'quantity' => $row->quantity,
                    'price' => $row->price,
                ];
            }
            $this->calculateAmount();
        }
    }

    public function calculateAmount() {
        $this->amount = 0;
        foreach ($this->items as $item) {
            $this->amount += $item['quantity'] * $item['price'];
        }
    }

    #[On('item-added')]
    public function itemAdded($id, $quantity, $price)
    {
        $this->items[$id] = [
            'id' => $id,
            'quantity' => $quantity,
            'price' => $price,
        ];

        $this->calculateAmount();

        $this->dispatch('open-notification',
            title: __('notifications.titles.adding'),
            subtitle: __('notifications.supply.adding.success'),
            type: 'success'
        );
    }

    public function send()
    {
        $supply = Supply::updateOrCreate([
            'uuid' => $this->supply->uuid ?? Str::random(10),
        ], [
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
            'status' => 'new'
        ]);

        foreach ($this->items as $item) {
            $variant = ProductVariant::find($item['id']);
            $supply->rows()->updateOrCreate([
                'product->id' => $variant->id
            ], [
                'product' => $variant,
                'price' => $variant->product->wholesale_price,
                'quantity' => $item['quantity']
            ]);
        }

        return redirect()->route('supply.recap');
    }

    /**
     * @return View
     */
    public function render()
    {
        $product_ids = Product::all()->pluck('id');
        $variants = ProductVariant::with('product')
            ->whereIn('product_id', $product_ids)
            //            ->search(['product.name->it'], $this->search) // TODO: ricerca
            ->orderBy('product_id');

        //        foreach($this->filters as $k => $filter) {
        //            if($k === 'date') {
        //                if($filter['mode'] === 'single') {
        //                    $customers->whereDate($filter['column'], $filter['operator'], $filter['value']);
        //                } elseif($filter['mode'] === 'range') {
        //                    $customers->whereBetween($filter['column'], $filter['value']);
        //                }
        //            } else {
        //                $customers->where($filter['column'], $filter['operator'], $filter['value']);
        //            }
        //        }

        return view('livewire.components.admin-tables.supply.supply-table', [
            'variants' => $variants->paginate()
        ]);
    }
}
