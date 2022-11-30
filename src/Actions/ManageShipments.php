<?php

namespace Shippii\Actions;

use Shippii\Resources\Shipment;

trait ManageShipments
{
    public function listUserShipments(string $parameters)
    {
        return $this->get("shipment?{$parameters}");
    }

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

    public function updateShipment(Shipment $shipment)
    {
        $payload = [
            'receiver' => $shipment->receiver,
            'lines' => $shipment->lines,
        ];

        return $this->patch("shipment/{$shipment->id}", $payload);
    }

    public function updateShipmentState(Shipment $shipment)
    {
        return $this->post("shipment/{$shipment->id}/update-state/{$shipment->state}");
    }

    public function archiveShipment(Shipment $shipment)
    {
        return $this->patch("shipment/archive/{$shipment->id}");
    }
}