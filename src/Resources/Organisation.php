<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Organisation extends Resource
{
    public string $id;
    public string|null $name = null;
    public string|null $vatNumber = null;
    public string|null $companyNumber = null;
    public bool|null $vatRegistered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;

    public function index(array $parameters = [])
    {
        return $this->shippii->listOrganisations($parameters);
    }

    public function create()
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->shippii->createOrganisation($payload);
    }

    public function get()
    {
        return $this->shippii->getOrganisation($this->id);
    }

    public function update()
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->shippii->updateOrganisation($this->id, $payload);
    }

    public function delete()
    {
        return $this->shippii->deleteOrganisation($this->id);
    }
}