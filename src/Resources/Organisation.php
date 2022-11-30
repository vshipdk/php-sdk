<?php

namespace Shippii\Resources;

class Organisation extends Resource
{
    public string|null $id;
    public string|null $name = null;
    public string|null $vatNumber = null;
    public string|null $companyNumber = null;
    public bool|null $vatRegistered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;

    public function index(string $parameters = '')
    {
        return $this->shippii->listOrganisations($parameters);
    }

    public function create()
    {
        return $this->shippii->createOrganisation($this);
    }

    public function get()
    {
        return $this->shippii->getOrganisation($this);
    }

    public function update()
    {
        return $this->shippii->updateOrganisation($this);
    }

    public function delete()
    {
        return $this->shippii->deleteOrganisation($this);
    }
}