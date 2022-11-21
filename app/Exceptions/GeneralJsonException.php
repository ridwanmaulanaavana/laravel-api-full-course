<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class GeneralJsonException extends Exception
{

    protected $code = 422;
    public function report(){
        // di tempat ini kita logging the error
        // bisa juga sebagai tempat untuk sending email ketika terjadi error
        // 
    }

    public function render($request){
        return new JsonResponse([
            'errors' =>[
                'message' => $this->getMessage()
            ]
        ],$this->code);
    }
}
