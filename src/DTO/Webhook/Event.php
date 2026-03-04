<?php

declare(strict_types=1);

namespace Vship\DTO\Webhook;

use Vship\Enum\Webhook\ObjectType;
use Vship\Enum\WebhookType;

class Event
{
    /**
     * @param array<string, mixed> $objectData
     */
    public function __construct(
        public readonly ObjectType $objectType,
        public readonly WebhookType $webhookType,
        public readonly array $objectData,
    ) {}
}
