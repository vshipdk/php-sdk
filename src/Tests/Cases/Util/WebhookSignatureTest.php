<?php

declare(strict_types=1);

namespace Cases\Util;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Vship\Exceptions\SignatureVerificationException;
use Vship\Tests\Traits\TestsWebhooks;
use Vship\Util\WebhookSignature;

#[CoversClass(WebhookSignature::class)]
class WebhookSignatureTest extends TestCase
{
    use TestsWebhooks;

    public function testVerifyHeaderValidSignature()
    {
        list($payload, $secret, $signature) = $this->getLabelsCreatedWebhook();

        WebhookSignature::verifyHeader($payload, $signature, $secret);

        $this->assertTrue(true); // If no exception is thrown, the test passes
    }

    public function testVerifyHeaderEmptySignature()
    {
        $this->expectException(SignatureVerificationException::class);
        $this->expectExceptionMessage('No signatures found.');

        WebhookSignature::verifyHeader('test_payload', '', 'test_secret');
    }

    public function testVerifyHeaderInvalidSignature()
    {
        $this->expectException(SignatureVerificationException::class);
        $this->expectExceptionMessage('No signatures found matching the expected signature for payload.');

        WebhookSignature::verifyHeader('test_payload', 'invalid_signature', 'test_secret');
    }
}
