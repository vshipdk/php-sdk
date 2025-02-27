<?php

declare(strict_types=1);

namespace Vship\Models\Carrier;

use Vship\Models\CarrierAccount\CarrierAccount;

final class Carrier
{
    public ?string $id = null;

    public ?Owner $owner = null;

    public ?string $name = null;

    public ?CarrierAccount $account = null;

    public ?string $code = null;

    public ?CarrierSettings $settings = null;

    public ?int $status = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    public ?string $carrier_identification = null;
}
