<?php

declare(strict_types=1);

namespace Vship\Enum\Webhook;

use Vship\Models\Carrier\Carrier;
use Vship\Models\Shipment\Shipment;

enum ObjectType: string
{
    case CARRIER = 'carrier';
    case SHIPMENT = 'shipment';

    public function getClass(): string
    {
        return match ($this) {
            self::CARRIER => Carrier::class,
            self::SHIPMENT => Shipment::class,
        };
    }
}
