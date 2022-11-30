<?php

namespace Shippii\Resources;

class Shipment extends Resource
{
    public string|null $id;
    public int|null $type;
    public string|null $carrierId;
    public array|null $sender;
    public array|null $receiver;
    public array|null $lines;
    public array|null $carrierOptions;
    public string|null $state;

    public function index(string $parameters = '')
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
