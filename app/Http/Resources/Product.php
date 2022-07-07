<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductInfo as ProductInfoResource;

class Product extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'info' => ProductInfoResource::collection($this->productInfos),
        ];
    }
}
