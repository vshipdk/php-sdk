<?php
declare(strict_types=1);

namespace Shippii\Models\Shipment;

use Shippii\Models\ActivityLog\ActivityLog;
use Shippii\Models\Adderess\Address;
use Shippii\Models\Line\Line;
use Shippii\Models\OrganisationObject\OrganisationObject;
use Shippii\Models\Tag\Tag;
use Shippii\Models\User\User;

final class Shipment
{
    public string|null $id = null;
    public string|null $rateId = null;
    public string|null $type = null;
    public string|null $state = null;
    public string|null $creatorId = null;
    public string|null $creatorType = null;
    public string|null $sendableId = null;
    public string|null $sendableAddressId = null;
    public string|null $receivableId = null;
    public string|null $receivableAddressId = null;
    public string|null $sendableReference = null;
    public string|null $systemReference = null;
    public string|null $carrierIdentification = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
    public ShipmentCarrierData|null $shipmentCarrierData = null;
    public ShipmentReceivable|null $receivable = null;
    public Address|null $receivableAddress = null;
    public Address|null $sendableAddress = null;
    public OrganisationObject|null $organisationObject = null;
    public User|null $creator = null;
    /** @var Tag[]  */
    public array|null $tags = null;
    public string|null $group = null;
    /** @var ShipmentMetadata[]|null  */
    public array|null $metadata = null;
    /** @var ActivityLog[]|null  */
    public array|null $logs = null;
    /** @var Line[]|null  */
    public array|null $items = null;
    public string|null $parcelsCount = null;
    public string|null $parcelsCountUpdateReason = null;
}