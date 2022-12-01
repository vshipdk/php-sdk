<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\OrganisationObject;

trait ManageOrganisationObjects
{
    public function listOrganisationObjects(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("organisation-object?{$parameters}")['data'],
            class: OrganisationObject::class,
        );
    }

    public function createOrganisationObject(array $payload)
    {
        return new OrganisationObject($this->post('organisation-object', $payload)['data'], $this);
    }

    public function getOrganisationObject(string $organisationObjectId)
    {
        return new OrganisationObject($this->get("organisation-object/{$organisationObjectId}")['data'], $this);
    }

    public function updateOrganisationObject(string $organisationObjectId, array $payload)
    {
        return new OrganisationObject($this->patch("organisation-object/{$organisationObjectId}", $payload)['data'], $this);
    }

    public function deleteOrganisationObject(string $organisationObjectId)
    {
        $this->delete("organisation-object/{$organisationObjectId}");
    }
}