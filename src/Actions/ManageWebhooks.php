<?php

declare(strict_types=1);

namespace Vship\Actions;

use Vship\Util\Util;
use Vship\Util\Webhook;

trait ManageWebhooks
{
    public function handleWebhooks(mixed $payload, string $headerSignature, string $secret)
    {
        [$class, $data] = Webhook::constructEvent($payload, $headerSignature, $secret);

        return Util::convertToVshipObject($class, $data);
    }
}
