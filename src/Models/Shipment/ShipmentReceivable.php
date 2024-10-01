<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Shipment;

use Vship\SDK\Models\Address\Address;

final class ShipmentReceivable
{
    public ?string $id = null;

    public ?string $user_id = null;

    public ?string $first_name = null;

    public ?string $last_name = null;

    public ?string $email = null;

    public ?string $mobile_phone_e164 = null;

    public ?string $mobile_phone_national = null;

    public ?string $mobile_phone_raw = null;

    public ?string $registered_at = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    public ?string $type = null;

    public ?Address $address = null;
}
