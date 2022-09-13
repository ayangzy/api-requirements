<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class FetchProductsAction
{
    public function execute(): Collection
    {
        $product = Product::select('sku', 'name', 'category', 'currency', 'price');

        if (request()->has('category')) {
            $product->where('category', request()->input('category'));
        }

        return $product->get();
    }
}
