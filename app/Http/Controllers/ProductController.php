<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product as ProductModel;
use App\Models\ProductInfo as ProductInfoModel;
use App\Services\Persistence;
use App\Services\Responses\ResponseCollection;

class ProductController extends Controller{

    private Persistence $persistence;

    public function index(){
        return ProductResource::collection(ProductModel::all());
    }

    public function store(Request $request){
        $data = json_decode($request->data, true);

        $this->persistence->save($data, ProductModel::class, ProductInfoModel::class, 'product_id');
        
        return ResponseCollection::success();
    }

    public function show($id){
        return new ProductResource(ProductModel::find($id));
    }

    public function update(Request $request, $id){
        $data = json_decode($request->data, true);
        $this->persistence->update($data, ProductModel::find($id), 'productInfos');
        return ResponseCollection::success();
    }

    public function destroy($id){
        $this->persistence->delete(ProductModel::find($id), 'productInfos');
        return ResponseCollection::success();
    }
}
