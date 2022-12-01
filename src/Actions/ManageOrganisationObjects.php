<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\OrganisationObject;

trait ManageOrganisationObjects
{
    public function listOrganisationObjects(array $parameters): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("organisation-object?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: OrganisationObject::class,
            meta: $response['meta'],
        );
    }

    public function createOrganisationObject(array $payload): OrganisationObject
    {
        return new OrganisationObject($this->post('organisation-object', $payload)['data'], $this);
    }

    public function getOrganisationObject(string $organisationObjectId): OrganisationObject
    {
        return new OrganisationObject($this->get("organisation-object/{$organisationObjectId}")['data'], $this);
    }

    public function updateOrganisationObject(string $organisationObjectId, array $payload): OrganisationObject
    {
        return new OrganisationObject($this->patch("organisation-object/{$organisationObjectId}", $payload)['data'], $this);
    }

    public function deleteOrganisationObject(string $organisationObjectId): void
    {
        $this->delete("organisation-object/{$organisationObjectId}");
    }
}