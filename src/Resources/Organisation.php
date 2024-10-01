<?php

declare(strict_types=1);

namespace Shippii\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;

class Organisation extends Resource
{
    public string $id;

    public ?string $name = null;

    public ?string $vatNumber = null;

    public ?string $companyNumber = null;

    public ?bool $vatRegistered = null;

    public ?string $currency = null;

    public ?string $timezone = null;

    public ?array $settings = null;

    /**
     * Create organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->shippii->createOrganisation($payload);
    }

    /**
     * Update organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->shippii->updateOrganisation($this->id, $payload);
    }

    /**
     * Delete organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): array
    {
        return $this->shippii->deleteOrganisation($this->id);
    }
}
