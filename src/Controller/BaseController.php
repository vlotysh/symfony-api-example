<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController
{
    protected function performJsonResponse($data): JsonResponse
    {
        return new JsonResponse([
            'body' => $data,
            "error" => [
                    "code" => 200,
                "message" => "All good",
                "description" => "All good"
            ]
        ]);
    }
}