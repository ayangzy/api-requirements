<?php


namespace App\Traits;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

trait ApiResponses
{

    /**
     * Set the "not found" error response.
     *
     * @param $message
     * @param string $statusText
     * @param null $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFoundAlert($message, $statusText = 'not_found', $data = null): JsonResponse
    {
        $response = [
            'statusCode' => 404,
            'statusText' => $statusText,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return Response::json($response, 404);
    }

    /**
     * Set the success response alert.
     *
     * @param $message
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message, $data = null): JsonResponse
    {
        $response = [
            'statusCode' => 200,
            'statusText' => 'success',
            'message' => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return Response::json($response, 200);
    }
}
