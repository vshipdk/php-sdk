<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Shipment;

use Vship\SDK\Models\ActivityLog\ActivityLog;
use Vship\SDK\Models\Address\Address;
use Vship\SDK\Models\Carrier\Carrier;
use Vship\SDK\Models\Label\Label;
use Vship\SDK\Models\Line\Line;
use Vship\SDK\Models\OrganisationObject\OrganisationObject;
use Vship\SDK\Models\Parcel\Parcel;
use Vship\SDK\Models\Tag\Tag;
use Vship\SDK\Models\User\User;

final class Shipment
{
    public const OBJECT_NAME = 'shipment';

    public ?string $id = null;

    public ?string $rate_id = null;

    public ?int $type = null;

    public ?string $state = null;

    /** @var ShipmentMetadata[]|null */
    public ?array $metadata = null;

    /** @var Tag[]|null */
    public ?array $tags = null;

    public ?string $group = null;

    public ?string $creator_id = null;

    public ?string $creator_type = null;

    public ?string $sendable_id = null;

    public ?string $sendable_address_id = null;

    public ?string $receivable_id = null;

    public ?string $receivable_address_id = null;

    public ?string $sendable_reference = null;

    public ?string $system_reference = null;

    public ?Address $receivable_address = null;

    public ?ShipmentReceivable $receivable = null;

    public ?ShipmentReceivable $receiver = null;

    public ?Address $sendable_address = null;

    public ?OrganisationObject $organisation_object = null;

    public ?string $carrier_identification = null;

    public ?Carrier $carrier = null;

    public ?User $creator = null;

    /** @var Line[]|null */
    public ?array $shipment_lines = null;

    /** @var ActivityLog[]|null */
    public ?array $logs = null;

    public ?ShipmentCarrierData $shipment_carrier_data = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    public ?string $reference = null;

    public ?ShipmentSendable $sendable = null;

    public ?Label $label = null;

    /** @var Parcel[]|null */
    public ?array $parcels = null;
}
