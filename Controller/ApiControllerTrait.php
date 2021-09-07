<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

trait ApiControllerTrait
{
    protected function createJsonRsponse($data, $message = '', $status = 'success', $code = 200, $headers = [], $json = false): JsonResponse
    {
        return new JsonResponse([
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
        ], $code, $headers, $json);
    }

    protected function createJsonErrorRsponse($data, $message = '', $code = 400, $headers = [], $json = false): JsonResponse
    {
        return new JsonResponse([
            'status'  => 'error',
            'message' => $message,
            'data'    => $data,
        ], $code, $headers, $json);
    }
}
