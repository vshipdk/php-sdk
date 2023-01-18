<?php
declare(strict_types=1);

namespace Shippii\Models\Label;

use Shippii\Models\Label\Owner;

final class Label
{
    public string|null $id = null;
    public string|null $format = null;
    public string|null $type = null;
    public string|null $metadata = null;
    public Owner|null $owner = null;
    public string|null $url = null;
    public string|null $shipment_id = null;
    public string|null $created_at = null;

    public string|null $temporary_url = null;
}
