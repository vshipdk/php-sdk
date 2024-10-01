<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Label;

final class Label
{
    public ?string $id = null;

    public ?string $format = null;

    public ?string $type = null;

    public ?string $metadata = null;

    public ?Owner $owner = null;

    public ?string $url = null;

    public ?string $shipment_id = null;

    public ?string $created_at = null;

    public ?string $temporary_url = null;
}
