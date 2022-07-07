<?php
namespace App\Services\Transformers;

interface FormDataTransformer{
    public function transform($data, $additionalData);
}