<?php
declare(strict_types=1);

namespace Shippii\Models\Carrier;

final class CarrierAttribute
{
    public string|null $services = null;
    public string|null $dropPoint = null;
    public string|null $prodConceptId = null;
}