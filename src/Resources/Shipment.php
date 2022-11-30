<?php

namespace Shippii\Resources;

class Shipment extends Resource
{
    public string $id;
    public int $type;
    public string $carrierId;
    public array $sender;
    public array $receiver;
    public array $lines;
    public array $carrierOptions;
    public string $state;

    public function index(string $parameters)
    {
        return $this->shippii->listUserShipments($parameters);
    }

    public function create()
    {
        return $this->shippii->createShipment($this);
    }

    public function update()
    {
        return $this->shippii->updateShipment($this);
    }

    public function updateState()
    {
        return $this->shippii->updateShipmentState($this);
    }

    public function archive()
    {
        return $this->shippii->archiveShipment($this);
    }
}
