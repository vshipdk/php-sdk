<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Models\Organisation\Organisation;
use Shippii\Util\Util;

trait ManageOrganisations
{
    /**
     * Get All Organisations
     *
     * @param array $queryParams
     * @return Organisation[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getOrganisations(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/organisation?{$parameters}")['data'];
        return Util::convertToShippiiObjectCollection(Organisation::class, $response);
    }

    /**
     * Get Single Organisation
     *
     * @param string $organisationId
     * @return Organisation
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getOrganisation(string $organisationId): Organisation
    {
        $response = $this->get("v1/organisation/{$organisationId}")['data'];
        return Util::convertToShippiiObject(Organisation::class, $response);
    }

    /**
     * Create Organisation
     *
     * @param array $payload
     * @return Organisation
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createOrganisation(array $payload): Organisation
    {
        $response = $this->post('v1/organisation', $payload)['data'];
        return Util::convertToShippiiObject(Organisation::class, $response);
    }

    /**
     * Update Organisation
     *
     * @param string $organisationId
     * @param array $payload
     * @return Organisation
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateOrganisation(string $organisationId, array $payload): Organisation
    {
        $response = $this->patch("v1/organisation/{$organisationId}", $payload)['data'];
        return Util::convertToShippiiObject(Organisation::class, $response);
    }

    /**
     * Delete Organisation
     *
     * @param string $organisationId
     * @return Organisation
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteOrganisation(string $organisationId): Organisation
    {
        $response = $this->delete("v1/organisation/{$organisationId}")['data'];
        return Util::convertToShippiiObject(Organisation::class, $response);
    }
}