<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        $product->variants()->delete();
    }
}
