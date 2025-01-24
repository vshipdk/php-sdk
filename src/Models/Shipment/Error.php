<?php

declare(strict_types=1);

namespace Vship\Models\Shipment;

final class Error
{
    public function __construct(
        public readonly ?string $carrierMessage,
        public readonly ?string $carrierCode,
        public readonly ?string $carrierDetails,
    ) {}
}
