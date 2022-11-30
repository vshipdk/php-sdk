<?php

namespace Shippii\Actions;

use Shippii\Resources\OrganisationObject;

trait ManageOrganisationObjects
{
    public function listOrganisationObjects(string $parameters)
    {
        return $this->get("organisation-object?{$parameters}");
    }

    public function createOrganisationObject(OrganisationObject $organisationObject)
    {
        $payload = [
            'name' => $organisationObject->name,
            'organisation_id' => $organisationObject->organisationId,
            'currency' => $organisationObject->currency,
            'timezone' => $organisationObject->timezone,
            'settings' => $organisationObject->settings,
        ];

        return $this->post('organisation-object', $payload);
    }

    public function getOrganisationObject(OrganisationObject $organisationObject)
    {
        return $this->get("organisation-object?/{$organisationObject->id}");
    }

    public function updateOrganisationObject(OrganisationObject $organisationObject)
    {
        $payload = [
            'name' => $organisationObject->name,
            'vat_number' => $organisationObject->vatNumber,
            'company_number' => $organisationObject->companyNumber,
            'vat_registered' => $organisationObject->vatRegistered,
            'currency' => $organisationObject->currency,
            'timezone' => $organisationObject->timezone,
            'settings' => $organisationObject->settings,
        ];

        return $this->patch("organisation-object/{$organisationObject->id}", $payload);
    }

    public function deleteOrganisationObject(OrganisationObject $organisationObject)
    {
        return $this->delete("organisation-object/{$organisationObject->id}");
    }
}