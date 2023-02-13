<?php

namespace App\Exceptions;

use Exception;

class EnumException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return response()->json([
            'message' => $this->message,
            'code' => $this->code,
        ], 500);
    }    
}
