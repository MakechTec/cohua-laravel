<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\CartItemInfo as CartItemInfoResource;

class CartItem extends JsonResource{

    public function toArray($request){
        return [
            'id' => $this->id,
            'product' => new ProductResource($this->product),
            'infos' => CartItemInfoResource::collection($this->cartItemInfos),
        ];
    }
}
