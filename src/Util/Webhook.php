<?php

declare(strict_types=1);

namespace Shippii\Util;

use Shippii\Exceptions\FailedActionException;

abstract class Webhook
{
    public static function constructEvent(mixed $payload, string $headerSignature, string $secret)
    {
        WebhookSignature::verifyHeader($payload, $headerSignature, $secret);

        $payloadArr = \json_decode($payload, true);

        $jsonError = \json_last_error();

        if ($payloadArr === null && $jsonError !== \JSON_ERROR_NONE) {
            $msg = "Invalid payload: {$payload} "
                ."(json_last_error() was {$jsonError})";

            throw new FailedActionException($msg);
        }

        $objectType = $payloadArr['data']['object_type'];
        $class = self::convertToObject($objectType);

        return [$class, $payloadArr['data'][$objectType]];
    }

    private static function convertToObject(string $targetClass)
    {
        $types = ObjectTypes::mapping;

        $class = $types[$targetClass];

        return $class;
    }
}
