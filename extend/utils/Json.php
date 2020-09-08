<?php
namespace utils;

use think\Response;

class Json
{

    public function success($data, $message = 'success')
    {
        return Response::create([
            'code'    => 200,
            'message' => $message,
            'data'    => $data ?: []
        ], 'json', 200);
    }

    public function fail($code = 400, $message = 'fail')
    {
        return Response::create([
            'code'    => $code,
            'message' => $message,
        ], 'json', $code);
    }
}
