<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Label extends Resource
{
    public string|null $id;
    public string $shipmentId;
    public string|null $format;
    public string|null $metadata;
    public string|null $owner;
    public string|null $url;
    public string|null $createdAt;

    public function fetchPrintShipmentLabel(array $parameters)
    {
        return $this->shippii->fetchPrintShipmentLabel($this->shipmentId, $parameters);
    }
}