<?php

namespace Shippii\Actions;

use Shippii\Resources\Organisation;

trait ManageOrganisations
{
    public function listOrganisations(string $parameters)
    {
        return $this->get("organisation?{$parameters}");
    }
    
    public function createOrganisation(Organisation $organisation)
    {
        $payload = [
            'name' => $organisation->name,
            'vat_number' => $organisation->vatNumber,
            'company_number' => $organisation->companyNumber,
            'vat_registered' => $organisation->vatRegistered,
            'currency' => $organisation->currency,
            'timezone' => $organisation->timezone,
            'settings' => $organisation->settings,
        ];

        return $this->post('organisation', $payload);
    }

    public function getOrganisation(Organisation $organisation)
    {
        return $this->get("organisation/{$organisation->id}");
    }
    
    public function updateOrganisation(Organisation $organisation)
    {
        $payload = [
            'name' => $organisation->name,
            'vat_number' => $organisation->vatNumber,
            'company_number' => $organisation->companyNumber,
            'vat_registered' => $organisation->vatRegistered,
            'currency' => $organisation->currency,
            'timezone' => $organisation->timezone,
            'settings' => $organisation->settings,
        ];

        return $this->patch("organisation/{$organisation->id}", $payload);
    }

    public function deleteOrganisation(Organisation $organisation)
    {
        return $this->delete("organisation/{$organisation->id}");
    }
}