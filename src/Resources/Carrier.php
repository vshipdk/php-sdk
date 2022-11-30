<?php

namespace Shippii\Resources;

class Carrier extends Resource
{
    public string|null $id;
    public string|null $name;
    public string|null $code;
    public int|null $status;
    public string|null $carrierAccountId;
    public array|null $settings = null;

    public function index(string $parameters = '')
    {
        return $this->shippii->listCarriers($parameters);
    }

    public function create()
    {
        return $this->shippii->createCarrier($this);
    }

    public function get()
    {
        return $this->shippii->getCarrier($this);
    }

    public function update()
    {
        return $this->shippii->updateCarrier($this);
    }

    public function delete()
    {
        return $this->shippii->deleteCarrier($this);
    }
}