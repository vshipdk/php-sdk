<?php
declare(strict_types=1);

namespace Shippii\Models\Label;

final class Label
{
    public string|null $id = null;
    public string|null $shipmentId = null;
    public string|null $format = null;
    public string|null $metadata = null;
    public Owner|null $owner = null;
    public string|null $url = null;
    public string|null $createdAt = null;
}
