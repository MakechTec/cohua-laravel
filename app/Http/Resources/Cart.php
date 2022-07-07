<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CartItem as CartItemResource;

class Cart extends JsonResource{

    public function toArray($request){
        return [
            'id' => $this->id,
            'items' => CartItemResource::collection($this->cartItems),
        ];
    }
}
