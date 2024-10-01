<?php

declare(strict_types=1);

namespace Vship\SDK\Util;

use Vship\SDK\Models\Carrier\Carrier;
use Vship\SDK\Models\Shipment\Shipment;

class ObjectTypes
{
    public const mapping = [
        Carrier::OBJECT_NAME => Carrier::class,
        Shipment::OBJECT_NAME => Shipment::class,
    ];
}
