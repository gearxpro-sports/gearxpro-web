<?php

namespace App\Livewire\Components\AdminTables\Supply;

use App\Livewire\Components\AdminTables\BaseTable;
use App\Models\User;
use App\Models\ProductVariant;
use App\Models\Supply;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class SupplyTable extends BaseTable
{
    public $supply;
    public $items = [];
    public $amount = 0;
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
    public $selected_customer = null;

    public function mount()
    {
        $this->supply = auth()->user()->supplies()->where('confirmed', false)->first();

        if ($this->supply) {
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

    public function calculateAmount()
    {
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

    public function sendAgent()
    {
        $selCustomer = json_decode($this->selected_customer, true);
        $userId = auth()->user()->hasRole(User::AGENT) ? $selCustomer["id"] : auth()->user()->id;

        $supply = Supply::updateorCreate([
            'uuid' => $this->supply->uuid ?? Str::random(10), // TODO: Random string to check before in the db.
        ], [
            'user_id' => $userId,
            'creator_id' => auth()->user()->id,
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

        return redirect()->route('supply.recap-agent');
    }

    /**
     * @return View
     */
    public function render()
    {
        $variants = ProductVariant::with('product')
            ->whereHas('product.countries', function (Builder $query) {
                $query
                    ->where('country_id', auth()->user()->country_id)
                    ->whereNotNull('wholesale_price')
                    ->whereNotNull('price');
            })
            ->when($this->selected_availability, function ($query) {
                $amount = explode('lt_', $this->selected_availability)[1];
                return $query->where('quantity', '<=', $amount);
            })
            ->when($this->selected_price, function ($query) {
                return $query->join('country_product', 'country_product.product_id', '=', 'product_variants.product_id')
                    ->where('country_id', auth()->user()->country_id)
                    ->orderBy('country_product.wholesale_price', $this->selected_price);
            })
            ->search($this->search, [
                'product.name',
                'terms.value',
                'sku'
            ])
            ->orderBy('product_variants.product_id');
        
        if (auth()->user()->hasRole(User::AGENT))
            $customersList = User::where('idAgent', auth()->user()->id)->select('id', "firstname", "lastname")->get();

        return view('livewire.components.admin-tables.supply.supply-table', [
            'variants' => $variants->paginate(25),
            'customers' => $customersList ?? [],
        ]);
    }
}
