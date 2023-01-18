<?php
declare(strict_types=1);

namespace Shippii\Models\Parcel;

use Shippii\Models\Label\Label;

final class Parcel
{
    public string|null $id = null;
    public string|null $sendable_reference = null;
    public string|null $system_reference = null;
    public string|null $barcode = null;
    public string|null $carrier_number = null;
    public string|null $carrier_tracking_url = null;
    public int|null $weight = null;
    public string|null $volume = null;
    public string|null $volumetric_weight = null;
    public Label|null $label = null;
}
