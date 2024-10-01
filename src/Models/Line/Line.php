<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Line;

use Vship\SDK\Models\Shipment\ShipmentItem;

final class Line
{
    public ?string $id = null;

    public ?string $shipment_id = null;

    public ?string $item_id = null;

    public ?int $quantity = null;

    public ?int $total_volume = null;

    public ?int $total_weight = null;

    public ?int $total_value = null;

    public ?string $value_currency = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    public ?ShipmentItem $item = null;
}
