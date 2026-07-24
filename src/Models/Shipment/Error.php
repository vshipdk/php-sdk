<?php

declare(strict_types=1);

namespace Vship\Models\Shipment;

final readonly class Error
{
    public function __construct(
        public ?string $carrierMessage,
        public ?string $carrierCode,
        public ?string $carrierDetails,
    ) {}
}
