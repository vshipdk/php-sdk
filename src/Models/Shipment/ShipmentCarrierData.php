<?php
declare(strict_types=1);

namespace Shippii\Models\Shipment;

use Shippii\Models\Carrier\Carrier;
use Shippii\Models\Carrier\CarrierAttribute;

final class ShipmentCarrierData
{
    public string|null $id = null;
    public string|null $identifier = null;
    public string|null $carrier_state = null;
    public CarrierAttribute|null $carrier_attributes = null;
    public bool|null $has_multiple_identifiers = null;
    /** @var array<string>|null  */
    public array|null $identifiers = null;
    public string|null $previous_data = null;
    public Carrier|null $carrier = null;
    public string|null $shipment_id = null;
    public string|null $carrier_id = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
}