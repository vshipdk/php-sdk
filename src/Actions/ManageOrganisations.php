<?php

namespace Shippii\Actions;

trait ManageOrganisations
{
    public function listOrganisations(string $parameters)
    {
        return $this->get("organisation?{$parameters}");
    }
    
    public function createOrganisation(array $payload)
    {
        return $this->post('organisation', $payload);
    }

    public function getOrganisation(string $organisationId)
    {
        return $this->get("organisation/{$organisationId}");
    }
    
    public function updateOrganisation(string $organisationId, array $payload)
    {
        return $this->patch("organisation/{$organisationId}", $payload);
    }

    public function deleteOrganisation(string $organisationId)
    {
        return $this->delete("organisation/{$organisationId}");
    }
}