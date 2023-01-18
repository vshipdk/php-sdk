<?php
declare(strict_types=1);

namespace Shippii\Models\Carrier;

final class CarrierAttribute
{
    public string|null $services = null;
    public string|null $drop_point = null;
    public string|null $prod_concept_id = null;
    public string|null $service_code = null;
}