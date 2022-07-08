<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model{

    protected $table = "cart_items";

    use HasFactory;

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function cartItemInfos(){
        return $this->hasMany(CartItemInfo::class);
    }
}
