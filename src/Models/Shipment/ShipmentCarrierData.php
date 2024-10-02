<?php

declare(strict_types=1);

namespace Vship\Models\Shipment;

use Vship\Models\Carrier\Carrier;

final class ShipmentCarrierData
{
    public ?string $id = null;

    public ?string $identifier = null;

    public ?string $carrier_state = null;

    /**
     * @var array<string, ?string>|null
     */
    public ?array $carrier_attributes = null;

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
