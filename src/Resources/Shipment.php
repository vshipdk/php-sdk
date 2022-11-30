<?php

namespace Shippii\Resources;

class Shipment extends Resource
{
    public string $id;
    public int $type;
    public string $carrierId;
    public array $sender;
    public array|null $receiver = null;
    public array|null $lines = null;
    public array $carrierOptions;
    public string $state;

    public function index(array $parameters = [])
    {
        $parameters = $this->prepareParameters($parameters);

        return $this->shippii->listUserShipments($parameters);
    }

    public function create()
    {
        $payload = $this->preparePayload(['type', 'carrier_id', 'sender', 'receiver', 'lines', 'carrier_options']);

        return $this->shippii->createShipment($payload);
    }

    public function update()
    {
        $payload = $this->preparePayload(['receiver', 'lines']);

        return $this->shippii->updateShipment($this->id, $payload);
    }

    public function updateState()
    {
        return $this->shippii->updateShipmentState($this->id, $this->state);
    }

    public function archive()
    {
        return $this->shippii->archiveShipment($this->id);
    }
}
