<?php
declare(strict_types=1);

namespace Shippii\Resources;

class OrganisationObject extends Resource
{
    public string $id;
    public string|null $name = null;
    public string $organisationId;
    public array $organisation;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array
    {
        return $this->shippii->listOrganisationObjects($parameters);
    }

    public function create(): self
    {
        $payload = $this->preparePayload(['name', 'organisation_id', 'currency', 'timezone', 'settings']);

        return $this->shippii->createOrganisationObject($payload);
    }

    public function get(): self
    {
        return $this->shippii->getOrganisationObject($this->id);
    }

    public function update(): self
    {
        $payload = $this->preparePayload(['name', 'currency', 'timezone', 'settings']);

        return $this->shippii->updateOrganisationObject($this->id, $payload);
    }

    public function delete(): void
    {
        $this->shippii->deleteOrganisationObject($this->id);
    }
}