<?php

declare(strict_types=1);

namespace Vship\Util;

use Vship\Models\Carrier\Carrier;
use Vship\Models\Shipment\Shipment;

class ObjectTypes
{
    public const mapping = [
        Carrier::OBJECT_NAME => Carrier::class,
        Shipment::OBJECT_NAME => Shipment::class,
    ];
}
