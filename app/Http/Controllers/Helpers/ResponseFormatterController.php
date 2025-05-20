<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseFormatterController extends Controller
{
    public static $meta = [
        'code' => 200,
        'message' => 'OK',
        'data' => null,
    ];

    public static function success($data, $message = null, $code = 200)
    {
        self::$meta['code'] = $code;
        self::$meta['message'] = $message ?? 'OK';
        self::$meta['data'] = $data;

        return response()->json(self::$meta, self::$meta['code']);
    }

    public static function error($message, $code = 400)
    {
        self::$meta['code'] = $code;
        self::$meta['message'] = $message;
        self::$meta['data'] = null;

        return response()->json(self::$meta, self::$meta['code']);
    }

}
