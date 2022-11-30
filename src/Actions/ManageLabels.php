<?php

namespace Shippii\Actions;

use Shippii\Resources\Label;

trait ManageLabels
{
    public function fetchPrintShipmentLabel(Label $label, string $parameters)
    {
        return $this->get("label/{$label->shipmentId}?{$parameters}");
    }
}