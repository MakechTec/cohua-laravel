<?php

namespace App\Http\Controllers;

use App\Http\Resources\Cart as CartResource;
use App\Http\Resources\CartItem as CartItemResource;
use App\Models\Cart as CartModel;
use App\Models\CartItem as CartItemModel;
use App\Models\CartItemInfo as CartItemInfoModel;
use App\Services\Responses\ResponseCollection;
use App\Services\Persistence;
use Illuminate\Http\Request;

class CartController extends Controller{

    private Persistence $persistence;

    public function index(){

        return CartResource::collection(CartModel::all());
    }

    public function store(Request $request){
        $cart = new CartModel();

        return ResponseCollection::success([
            'cart_id' => $cart->id,
        ]);
    }

    public function show($id){
        return new CartResource(CartModel::find($id));
    }

    public function destroy($id){
        CartModel::destroy($id);
        return ResponseCollection::success();
    }

    public function addItem(Request $request, $id){
        $data = json_decode($request->data, true);
        $cart = CartModel::find($id);
        CartItemModel::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
        ]);

        $this->persistence->save($data, CartItemModel::class, CartItemInfoModel::class, 'cart_item_id');
        return ResponseCollection::success();
    }

    public function removeItem($id, $productId){
        $cart = CartModel::find($id);
        $cart->cartItems()->where('product_id', $productId)->delete();
        return ResponseCollection::success();
    }

    public function singleItem($id, $productId){
        $cart = CartModel::find($id);
        $item = $cart->cartItems()
                    ->where('product_id', $productId)
                    ->first();
                    
        return new CartItemResource($item);
    }
}
