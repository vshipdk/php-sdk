<?php

declare(strict_types=1);

namespace Vship\Resources;

class Label extends Resource
{
    public ?string $id;

    public string $shipmentId;

    public ?string $format;

    public ?string $metadata;

    public ?string $owner;

    public ?string $url;

    public ?string $createdAt;
}
