<?php

declare(strict_types=1);

namespace Shippii\Models\Carrier;

final class CarrierAttribute
{
    public ?string $services = null;

    public ?string $drop_point = null;

    public ?string $prod_concept_id = null;

    public ?string $service_code = null;
}
