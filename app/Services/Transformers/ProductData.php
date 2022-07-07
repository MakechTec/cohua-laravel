<?php
namespace App\Services\Transformers;

use League\Pipeline\Pipeline;

class ProductData implements FormDataTransformer{

    public function transform($data = [], $additionalData = []){
        $pipe = new Pipeline();
        $pipe->pipe(function($data){
            return json_decode($data, true);
        });
        return $pipe->process($data);
    }
}