<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Models\OrganisationObject\OrganisationObject;

trait ManageOrganisationObjects
{
    /**
     * Get All Organisation Objects
     *
     * @param array $parameters
     * @return OrganisationObject[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getOrganisationObjects(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("v1/organisation-object?{$parameters}")['data'];
        return Util::convertToShippiObjectCollection(OrganisationObject::class, $response);
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
        $response = $this->get("v1/organisation-object/{$organisationObjectId}")['data'];

        return Util::convertToShippiObject(OrganisationObject::class, $response);
    }

    /**
     * Create Organisation Object
     *
     * @param array $payload
     * @return OrganisationObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createOrganisationObject(array $payload): OrganisationObject
    {
        $response = $this->post('v1/organisation-object', $payload)['data'];
        return Util::convertToShippiObject(OrganisationObject::class, $response);
    }

    /**
     * Update Organisation Object
     *
     * @param string $organisationObjectId
     * @param array $payload
     * @return OrganisationObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateOrganisationObject(string $organisationObjectId, array $payload): OrganisationObject
    {
        $response = $this->patch("v1/organisation-object/{$organisationObjectId}", $payload)['data'];
        return Util::convertToShippiObject(OrganisationObject::class, $response);
    }

    /**
     * Delete Organisation Object
     *
     * @param string $organisationObjectId
     * @return OrganisationObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteOrganisationObject(string $organisationObjectId): OrganisationObject
    {
        $response = $this->delete("v1/organisation-object/{$organisationObjectId}")['data'];
        return Util::convertToShippiObject(OrganisationObject::class, $response);
    }
}