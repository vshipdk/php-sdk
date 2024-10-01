<?php

declare(strict_types=1);

namespace Vship\SDK\Resources;

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
