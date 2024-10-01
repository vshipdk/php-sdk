<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Tag;

final class Tag
{
    public ?string $id = null;

    public ?string $name = null;

    public ?string $slug = null;

    public ?string $type = null;

    public ?int $order_column = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;
}
