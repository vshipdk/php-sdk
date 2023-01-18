<?php
declare(strict_types=1);

namespace Shippii\Models\Line;

use Shippii\Models\Shipment\ShipmentItem;

final class Line
{
    public string|null $id = null;
    public string|null $shipment_id = null;
    public string|null $item_id = null;
    public int|null $quantity = null;
    public int|null $total_volume = null;
    public int|null $total_weight = null;
    public int|null $total_value = null;
    public string|null $value_currency = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
    public ShipmentItem|null $item = null;

}