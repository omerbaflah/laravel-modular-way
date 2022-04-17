<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiResponseHandler
{
    /**
     * success response method.
     *
     * @param mixed $message
     * @param null|mixed $data
     * @param mixed $status_code
     *
     * @return JsonResponse
     */
    public static function respondWithSuccess($message = 'OK', $data = null, $status_code = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'success'     => true,
            'message'     => $message,
            'data'        => $data,
            'status_code' => $status_code,
        ];

        return response()->json($response, $status_code);
    }

    /**
     * return error response.
     *
     * @param mixed $message
     * @param null|mixed $data
     * @param mixed $status_code
     * @param null|mixed $errors
     *
     * @return JsonResponse
     */
    public static function respondWithError($message = 'Error', $data = null, $status_code = Response::HTTP_NOT_FOUND, $errors = null): JsonResponse
    {
        $response = [
            'success'     => false,
            'message'     => $message,
            'errors'      => $errors,
            'data'        => $data,
            'status_code' => $status_code,
        ];

        return response()->json($response, $status_code);
    }
}
