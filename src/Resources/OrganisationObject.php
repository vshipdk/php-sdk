<?php
declare(strict_types=1);

namespace Shippii\Resources;

class OrganisationObject extends Resource
{
    public string $id;
    public string|null $name = null;
    public string $organisationId;
    public array $organisation;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;
    public string|null $createdAt;
    public string|null $updatedAt;

    /**
     * Create Organisation Object
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
        $payload = $this->preparePayload(['name', 'organisation_id', 'currency', 'timezone', 'settings']);

        return $this->shippii->createOrganisationObject($payload);
    }

    /**
     * Update organisation object
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
        $payload = $this->preparePayload(['name', 'currency', 'timezone', 'settings']);

        return $this->shippii->updateOrganisationObject($this->id, $payload);
    }

    /**
     * Delete Organisation Object
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
        return $this->shippii->deleteOrganisationObject($this->id);
    }
}