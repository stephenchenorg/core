<?php

namespace Stephenchen\Core\Traits;

use Illuminate\Http\Response;
use Stephenchen\Core\Service\Response\ResponseObject;

trait ResponseJsonTrait
{
    /**
     * Success response data format
     *
     * @param       $message
     * @param array $results
     * @param array $custom
     * @return Response
     */
    public static function jsonSuccess($message, $results = [], $custom = [], $statusCode = 200)
    {
        return ResponseObject::success($message, $results, $custom, $statusCode);
    }

    /**
     * Fail response
     *
     * @param       $message
     * @param int $messageCode
     * @param array $custom
     * @param int $statusCode
     * @return Response
     */
    public static function jsonFail($message, $messageCode = 400, $statusCode = 400, $custom = [])
    {
        return ResponseObject::fail($message, $messageCode, $statusCode, $custom);
    }
}
