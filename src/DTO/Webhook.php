<?php

declare(strict_types=1);

namespace Vship\DTO;

class Webhook
{
    public function __construct(
        public readonly string $type,
        public readonly object $object,
    ) {}
}
