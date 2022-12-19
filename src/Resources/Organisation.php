<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Organisation extends Resource
{
    public string $id;
    public string|null $name = null;
    public string|null $vatNumber = null;
    public string|null $companyNumber = null;
    public bool|null $vatRegistered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;

    /**
     * Create organisation
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->shippii->createOrganisation($payload);
    }

    /**
     * Update organisation
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->shippii->updateOrganisation($this->id, $payload);
    }

    /**
     * Delete organisation
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function delete(): array
    {
        return $this->shippii->deleteOrganisation($this->id);
    }
}