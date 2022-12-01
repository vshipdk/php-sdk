<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Organisation;

trait ManageOrganisations
{
    public function listOrganisations(array $parameters): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("organisation?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Organisation::class,
            meta: $response['meta'],
        );
    }
    
    public function createOrganisation(array $payload): Organisation
    {
        return new Organisation($this->post('organisation', $payload)['data'], $this);
    }

    public function getOrganisation(string $organisationId): Organisation
    {
        return new Organisation($this->get("organisation/{$organisationId}")['data'], $this);
    }
    
    public function updateOrganisation(string $organisationId, array $payload): Organisation
    {
        return new Organisation($this->patch("organisation/{$organisationId}", $payload)['data'], $this);
    }

    public function deleteOrganisation(string $organisationId): void
    {
        $this->delete("organisation/{$organisationId}");
    }
}