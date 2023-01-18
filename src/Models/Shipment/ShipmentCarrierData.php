<?php
declare(strict_types=1);

namespace Shippii\Models\Shipment;

use Shippii\Models\Carrier\Carrier;
use Shippii\Models\Carrier\CarrierAttribute;

final class ShipmentCarrierData
{
    public string|null $id = null;
    public string|null $shipmentId = null;
    public string|null $carrierId = null;
    public string|null $carrierState = null;
    public string|null $previousData = null;
    public string|null $identifier = null;
    /** @var CarrierAttribute[]|null  */
    public array|null $carrierAttributes = null;
    public bool|null $hasMultipleIdentifiers = null;
    /** @var array<string>|null  */
    public array|null $identifiers = null;
    public Carrier|null $carrier = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
}