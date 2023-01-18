<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Models\CarrierAccount\CarrierAccount;
use Shippii\Models\CarrierAccount\CarrierAccountFields;

trait ManageCarriersAccounts
{
    /**
     * Get All Carrier Accounts
     *
     * @param array $queryParams
     * @return CarrierAccount[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccounts(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier-account?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(CarrierAccount::class, $response);
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
        $response = $this->get("v1/carrier-account/{$carrierAccountId}")['data'];
        // dd($response);
        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Create Carrier Account
     *
     * @param array $payload
     * @return CarrierAccount
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createCarrierAccount(array $payload): CarrierAccount
    {
        $response = $this->post("v1/carrier-account", $payload)['data'];
        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Update Carrier Account
     *
     * @param string $carrierAccountId
     * @param array $payload
     * @return CarrierAccount
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateCarrierAccount(string $carrierAccountId, array $payload): CarrierAccount
    {
        $response = $this->patch("v1/carrier-account/{$carrierAccountId}")['data'];
        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Delete Carrier Account
     *
     * @param string $carrierAccountId
     * @return CarrierAccount
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteCarrierAccount(string $carrierAccountId): CarrierAccount
    {
        $response = $this->delete("v1/carrier-account/{$carrierAccountId}")['data'];
        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    // TODO:
    /**
     * Get Carrier Account Fields
     *
     * @param string $carrierCode
     * @return CarrierAccountFields[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccountFields(string $carrierCode): array
    {
        $response = $this->get("v1/carrier-account/fields/{$carrierCode}")['data'];
        return Util::convertToShippiiObjectCollection(CarrierAccountFields::class, $response); 
    }
}