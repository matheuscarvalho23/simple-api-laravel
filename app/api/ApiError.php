<?php

namespace App\api;

class ApiError
{
    public static function errorMessage($status, $message, $code)
    {
        return [
            'data' => [
                'status'  => $status,
                'message' => $message,
                'code'    => $code
            ],
        ];
    }
}