<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Organisation;

trait ManageOrganisations
{
    /**
     * Get All Organisations
     *
     * @param array $queryParams
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getOrganisations(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/organisation?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Organisation::class,
            meta: $response['meta'],
        );
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
        return new Organisation(
            $this->get("v1/organisation/{$organisationId}")['data'], 
            $this
        );
    }

    /**
     * Create Organisation
     *
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createOrganisation(array $payload): array
    {
        return $this->post('v1/organisation', $payload);
    }

    /**
     * Update Organisation
     *
     * @param string $organisationId
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateOrganisation(string $organisationId, array $payload): array
    {
        return $this->patch("v1/organisation/{$organisationId}", $payload);
    }

    /**
     * Delete Organisation
     *
     * @param string $organisationId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteOrganisation(string $organisationId): array
    {
        return $this->delete("v1/organisation/{$organisationId}");
    }
}