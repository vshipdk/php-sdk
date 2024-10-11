<?php

declare(strict_types=1);

namespace Vship\Tests\Traits;

use Vship\Tests\Utils;

trait TestsWebhooks
{
    protected function getLabelsCreatedWebhook(): array
    {
        $payload = Utils::getFixture('webhook/labels-created.json');
        $secret = 'test_secret';
        $signature = hash_hmac('sha256', $payload, $secret);
        return [$payload, $secret, $signature];
    }
}
