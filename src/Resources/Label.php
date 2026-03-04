<?php

declare(strict_types=1);

namespace Vship\Resources;

class Label extends BaseResource
{
    public ?string $id = null;

    public string $shipmentId;

    public ?string $format = null;

    public ?string $metadata = null;

    public ?string $owner = null;

    public ?string $url = null;

    public ?string $createdAt = null;
}
