<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemInfo extends JsonResource{

    public function toArray($request){

        return [
            'id' => $this->id,
            'field' => $this->field,
            'value' => $this->value,
        ];
    }
}
