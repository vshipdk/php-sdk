<?php

declare(strict_types=1);

namespace Vship\Util;

use Vship\Exceptions\SignatureVerificationException;

abstract class WebhookSignature
{
    public static function verifyHeader(string $payload, string $headerSignature, string $secret)
    {
        if (empty($headerSignature)) {
            throw new SignatureVerificationException('No signatures found.');
        }

        $expectedSignature = self::verifySignature($payload, $secret, $headerSignature);

        if (! $expectedSignature) {
            throw new SignatureVerificationException('No signatures found matching the expected signature for payload.');
        }
    }

    private static function verifySignature($payload, $secret, $signature)
    {
        return \hash_hmac('sha256', $payload, $secret) === $signature;
    }
}
