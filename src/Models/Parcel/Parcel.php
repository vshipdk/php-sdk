<?php

declare(strict_types=1);

namespace Vship\Models\Parcel;

use Vship\Models\Label\Label;

final class Parcel
{
    public ?string $id = null;

    public ?string $sendable_reference = null;

    public ?string $system_reference = null;

    public ?string $barcode = null;

    public ?string $carrier_number = null;

    public ?string $carrier_tracking_url = null;

    public ?int $weight = null;

    public ?string $volume = null;

    public ?string $volumetric_weight = null;

    public ?Label $label = null;
}
