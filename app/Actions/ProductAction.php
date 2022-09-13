<?php

namespace App\Actions;

use App\Models\Product;

class ProductAction
{

    public function productPrice(Product $product): array
    {
        return [
            'original' => $product->price,
            'final' => $this->finalPrice($product),
            'discount_percentage' => $this->getPercentageDiscount($product),
            'currency' => $product->currency
        ];
    }


    private function finalPrice(Product $product): int
    {
        $productPrice = $product->price;

        if ($product->category === "insurance") {
            $discountValue = ($productPrice - ($productPrice * (30 / 100)));
            return $discountValue;
        }

        if ($product->sku === "000003") {
            $discountValue = ($productPrice - ($productPrice * (15 / 100)));
            return $discountValue;
        }

        return  $productPrice;
    }


    private function getPercentageDiscount(Product $product): ?string
    {
        if ($product->category === "insurance") {
            return "30%";
        }

        if ($product->sku === "000003") {
            return "15%";
        }

        return null;
    }
}
