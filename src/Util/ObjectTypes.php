<?php
declare(strict_types=1);

namespace Shippii\Util;

class ObjectTypes
{
    const mapping = [
        \Shippii\Models\Carrier\Carrier::OBJECT_NAME => \Shippii\Models\Carrier::class,
        \Shippii\Models\Shipment\Shipment::OBJECT_NAME => \Shippii\Models\Shipment\Shipment::class,
    ];
}
