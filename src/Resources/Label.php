<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Label extends Resource
{
    public string $shipmentId;

    public function fetchPrintShipmentLabel(array $parameters)
    {
        return $this->shippii->fetchPrintShipmentLabel($this->shipmentId, $parameters);
    }
}