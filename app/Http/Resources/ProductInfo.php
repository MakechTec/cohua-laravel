<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductInfo extends JsonResource{

    public function toArray($request){
        return [
            'id' => $this->id,
            'field' => $this->field,
            'value' => $this->value,
        ];
    }
}
