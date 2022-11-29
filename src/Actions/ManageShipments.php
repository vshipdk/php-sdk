<?php

namespace Shippii\Actions;

use Shippii\Resources\Shipment;

trait ManageShipments
{
    public function createShipment(Shipment $shipment)
    {
        $payload = [
            'type' => $shipment->type,
            'carrier_id' => $shipment->carrierId,
            'sender' => $shipment->sender,
            'receiver' => $shipment->receiver,
            'lines' => $shipment->lines,
            'carrier_options' => $shipment->carrierOptions,
        ];

        return $this->post('shipment', $payload);
    }
}