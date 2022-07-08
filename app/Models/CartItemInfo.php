<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItemInfo extends Model{

    protected $table = "cart_item_infos";
    use HasFactory;

    public function cartItem(){
        return $this->belongsTo(CartItem::class);
    }
}
