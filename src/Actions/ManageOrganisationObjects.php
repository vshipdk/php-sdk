<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\OrganisationObject;

trait ManageOrganisationObjects
{
    /**
     * Get All Organisation Objects
     *
     * @param array $parameters
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getOrganisationObjects(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("v1/organisation-object?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: OrganisationObject::class,
            meta: $response['meta'],
        );
    }

    /**
     * Get Single Organisation Object
     *
     * @param string $organisationObjectId
     * @return OrganisationObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getOrganisationObject(string $organisationObjectId): OrganisationObject
    {
        return new OrganisationObject(
            $this->get("v1/organisation-object/{$organisationObjectId}")['data'], 
            $this
        );
    }

    /**
     * Create Organisation Object
     *
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createOrganisationObject(array $payload): array
    {
        return $this->post('v1/organisation-object', $payload);
    }

    /**
     * Update Organisation Object
     *
     * @param string $organisationObjectId
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateOrganisationObject(string $organisationObjectId, array $payload): array
    {
        return $this->patch("v1/organisation-object/{$organisationObjectId}", $payload)['data'];
    }

    /**
     * Delete Organisation Object
     *
     * @param string $organisationObjectId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteOrganisationObject(string $organisationObjectId): array
    {
        return $this->delete("v1/organisation-object/{$organisationObjectId}");
    }
}