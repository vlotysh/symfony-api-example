<?php

namespace App\Listener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class JsonResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $body = json_decode($event->getResponse()->getContent());

        $jsonResponse = $this->performResponse($body);

        return $event->setResponse($jsonResponse);
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $jsonResponse = $this->performResponse('', $exception->getCode(), $exception->getMessage(), 'Error');
        return $event->setResponse($jsonResponse);

    }

    private function performResponse($body = '', $code = 200, $message = 'All good', $description = 'All good'): JsonResponse
    {
        return new JsonResponse([
            'body' => $body,
            'error' => [
                'code' => $code,
                'message' => $message,
                'description' => $description
            ]
        ]);
    }
}