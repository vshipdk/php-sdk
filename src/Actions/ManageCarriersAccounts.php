<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\CarrierAccount;

trait ManageCarriersAccounts
{
    /**
     * Get All Carrier Accounts
     *
     * @param array $queryParams
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccounts(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier-account?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: CarrierAccount::class,
            meta: $response['meta'],
        );
    }

    /**
     * Get Single Carrier Account by ID
     *
     * @param string $carrierAccountId
     * @return CarrierAccount
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccount(string $carrierAccountId): CarrierAccount
    {
        return new CarrierAccount(
            $this->get("v1/carrier-account/{$carrierAccountId}")['data'], 
            $this
        );
    }

    /**
     * Create Carrier Account
     *
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createCarrierAccount(array $payload): array
    {
        return $this->post("v1/carrier-account", $payload);
    }

    /**
     * Update Carrier Account
     *
     * @param string $carrierAccountId
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateCarrierAccount(string $carrierAccountId, array $payload): array
    {
        return $this->patch("v1/carrier-account/{$carrierAccountId}", $payload);
    }

    /**
     * Delete Carrier Account
     *
     * @param string $carrierAccountId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteCarrierAccount(string $carrierAccountId): array
    {
        return $this->delete("v1/carrier-account/{$carrierAccountId}");
    }

    /**
     * Get Carrier Account Fields
     *
     * @param string $carrierCode
     * @return CarrierAccount
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccountFields(string $carrierCode): CarrierAccount
    {
        $attributes = [
            'fields' => $this->get("v1/carrier-account/fields/{$carrierCode}")['data'],
            'carrier_code' => $carrierCode,
        ];

        return new CarrierAccount($attributes, $this);
    }
}