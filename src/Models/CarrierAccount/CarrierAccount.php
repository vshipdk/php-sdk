<?php

declare(strict_types=1);

namespace Vship\SDK\Models\CarrierAccount;

use Vship\SDK\Models\Carrier\Carrier;

final class CarrierAccount
{
    public ?string $id = null;

    public ?string $name = null;

    /** @var CarrierAccountFields[]|null */
    public ?array $fields = null;

    public ?string $carrier_code = null;

    public ?string $status = null;

    public ?string $purpose = null;

    /** @var Carrier[]|null */
    public ?array $carriers = null;

    public ?string $expires_at = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;
}
