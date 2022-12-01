<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Organisation;

trait ManageOrganisations
{
    public function listOrganisations(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("organisation?{$parameters}")['data'],
            class: Organisation::class,
        );
    }
    
    public function createOrganisation(array $payload)
    {
        return new Organisation($this->post('organisation', $payload)['data'], $this);
    }

    public function getOrganisation(string $organisationId)
    {
        return new Organisation($this->get("organisation/{$organisationId}")['data'], $this);
    }
    
    public function updateOrganisation(string $organisationId, array $payload)
    {
        return new Organisation($this->patch("organisation/{$organisationId}", $payload)['data'], $this);
    }

    public function deleteOrganisation(string $organisationId)
    {
        $this->delete("organisation/{$organisationId}");
    }
}