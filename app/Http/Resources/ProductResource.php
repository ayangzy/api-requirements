<?php

namespace App\Http\Resources;

use App\Actions\ProductAction;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'currency' => $this->currency,
            'price' => (new ProductAction())->productPrice($this->resource),
        ];
    }
}
