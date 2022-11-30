<?php

namespace Shippii\Resources;

class Label extends Resource
{
    public string|null $shipmentId;

    public function fetchPrintShipmentLabel(string $parameters)
    {
        return $this->shippii->fetchPrintShipmentLabel($this, $parameters);
    }
}