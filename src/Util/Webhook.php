<?php

declare(strict_types=1);

namespace Vship\Util;

use Vship\DTO\Webhook\Event;
use Vship\Enum\Webhook\ObjectType;
use Vship\Enum\WebhookType;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\SignatureVerificationException;

abstract class Webhook
{
    /**
     * @throws FailedActionException
     * @throws SignatureVerificationException
     */
    public static function constructEvent(string $payload, string $headerSignature, string $secret): Event
    {
        WebhookSignature::verifyHeader($payload, $headerSignature, $secret);

        $payloadArr = json_decode($payload, true);

        $jsonError = json_last_error();

        if ($payloadArr === null && $jsonError !== JSON_ERROR_NONE) {
            $msg = "Invalid payload: {$payload} "
                . "(json_last_error() was {$jsonError})";

            throw new FailedActionException($msg);
        }

        $objectType = $payloadArr['data']['object_type'];

        return new Event(
            objectType: ObjectType::from($objectType),
            webhookType: WebhookType::from($payloadArr['data']['event_type'] ?? ''),
            objectData: $payloadArr['data'][$objectType],
        );
    }
}
