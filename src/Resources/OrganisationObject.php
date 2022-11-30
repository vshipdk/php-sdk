<?php

namespace Shippii\Resources;

class OrganisationObject extends Resource
{
    public string|null $id;
    public string|null $name = null;
    public string|null $organisationId = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;
    public array|null $vatNumber = null;
    public array|null $companyNumber = null;
    public array|null $vatRegistered = null;

    public function index(string $parameters = '')
    {
        return $this->shippii->listOrganisationObjects($parameters);
    }

    public function create()
    {
        return $this->shippii->createOrganisationObject($this);
    }

    public function get()
    {
        return $this->shippii->getOrganisationObject($this);
    }

    public function update()
    {
        return $this->shippii->updateOrganisationObject($this);
    }

    public function delete()
    {
        return $this->shippii->deleteOrganisationObject($this);
    }
}