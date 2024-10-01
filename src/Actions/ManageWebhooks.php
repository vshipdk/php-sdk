<?php

declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Util\Webhook;

trait ManageWebhooks
{
    public function handleWebhooks(mixed $payload, string $headerSignature, string $secret)
    {
        [$class, $data] = Webhook::constructEvent($payload, $headerSignature, $secret);

        return Util::convertToShippiiObject($class, $data);
    }
}
