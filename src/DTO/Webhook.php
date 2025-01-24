<?php

declare(strict_types=1);

namespace Vship\DTO;

use Vship\Enum\WebhookType;

class Webhook
{
    public function __construct(
        public readonly WebhookType $type,
        public readonly object $object,
    ) {}
}
