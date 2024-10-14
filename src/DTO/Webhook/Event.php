<?php

declare(strict_types=1);

namespace Vship\DTO\Webhook;

use Vship\Enum\Webhook\ObjectType;

class Event
{
    public function __construct(
        public readonly ObjectType $objectType,
        public readonly array $objectData,
    ) {}
}
