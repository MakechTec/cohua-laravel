<?php
namespace App\Services\Responses;

class ResponseCollection{
    
    public static function success($payload = []){

        $default = [
            'status' => 'success',
            'code' => 200,
        ];

        return response()->json(array_merge($default, $payload));
    }

    public static function error($message = "error", $code = 500){
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'code' => $code,
        ]);
    }
}