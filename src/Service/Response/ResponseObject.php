<?php

namespace Stephenchen\Core\Service\Response;

use Illuminate\Http\Response;

final class ResponseObject
{
    /**
     *
     * @param       $message
     * @param array $result
     * @param array $custom
     *
     * @return Response
     */
    public static function success($message, $result = [], $custom = [])
    {
        $output = [
            'code' => 200,
            'msg'  => $message,
            'data' => $result,
        ];

        $output = array_merge($output, $custom);
        return response($output, 200);
    }

    /**
     *
     * @param       $message
     * @param int   $messageCode
     * @param int   $statusCode
     * @param array $custom
     *
     * @return Response
     */
    public static function fail($message, $messageCode = 400, $statusCode = 400, $custom = [])
    {
        $output = [
            'code' => $messageCode,
            'msg'  => $message,
            'data' => $custom,
        ];

        $output = array_merge($output, $custom);
        return response($output, $statusCode);
    }
}
