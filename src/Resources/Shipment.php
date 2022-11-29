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

    public function create()
    {
        return $this->shippii->createShipment($this);
    }
}
