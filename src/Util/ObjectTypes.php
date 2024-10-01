<?php

declare(strict_types=1);

namespace Shippii\Util;

use Shippii\Models\Carrier;
use Shippii\Models\Shipment\Shipment;

class ObjectTypes
{
    public const mapping = [
        Carrier\Carrier::OBJECT_NAME => Carrier::class,
        Shipment::OBJECT_NAME => Shipment::class,
    ];
}
