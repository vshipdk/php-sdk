<?php
declare(strict_types=1);

namespace Shippii\Actions;

trait ManageOrganisationObjects
{
    public function listOrganisationObjects(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->get("organisation-object?{$parameters}");
    }

    public function createOrganisationObject(array $payload)
    {
        return $this->post('organisation-object', $payload);
    }

    public function getOrganisationObject(string $organisationObjectId)
    {
        return $this->get("organisation-object?/{$organisationObjectId}");
    }

    public function updateOrganisationObject(string $organisationObjectId, array $payload)
    {
        return $this->patch("organisation-object/{$organisationObjectId}", $payload);
    }

    public function deleteOrganisationObject(string $organisationObjectId)
    {
        return $this->delete("organisation-object/{$organisationObjectId}");
    }
}