<?php

declare(strict_types=1);

namespace Vship\Tests\Traits;

use Vship\Tests\Utils;

trait TestsWebhooks
{
    protected function getLabelsCreatedWebhook(): array
    {
        $payload = Utils::getFixture('webhook/labels-created.json');
        return $this->prepareSignature($payload);
    }

    protected function getLabelsFailedWebhook(): array
    {
        $payload = Utils::getFixture('webhook/labels-failed.json');
        return $this->prepareSignature($payload);
    }

    private function prepareSignature(string $payload): array
    {
        $secret = 'test_secret';
        $signature = hash_hmac('sha256', $payload, $secret);
        return [$payload, $secret, $signature];
    }
}
