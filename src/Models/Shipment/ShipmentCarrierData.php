<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Shipment;

use Vship\SDK\Models\Carrier\Carrier;
use Vship\SDK\Models\Carrier\CarrierAttribute;

final class ShipmentCarrierData
{
    public ?string $id = null;

    public ?string $identifier = null;

    public ?string $carrier_state = null;

    public ?CarrierAttribute $carrier_attributes = null;

    public ?bool $has_multiple_identifiers = null;

    /** @var array<string>|null */
    public ?array $identifiers = null;

    public ?string $previous_data = null;

    public ?Carrier $carrier = null;

    public ?string $shipment_id = null;

    public ?string $carrier_id = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;
}
