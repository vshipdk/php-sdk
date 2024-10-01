<?php

declare(strict_types=1);

namespace Vship\SDK\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;

class Shipment extends Resource
{
    public const OBJECT_NAME = 'shipment';

    public string $id;

    public int $type;

    public ?string $carrierId;

    public array $sender;

    public ?array $receiver = null;

    public ?array $lines = null;

    public array $carrierOptions;

    public string $state;

    public ?string $rateId;

    public ?string $creatorId;

    public ?string $creatorType;

    public ?string $sendableId;

    public ?string $sendableAddressId;

    public ?string $receivableId;

    public ?string $receivableAddressId;

    public ?string $sendableReference;

    public ?string $carrierIdentification;

    public ?string $createdAt;

    public ?string $updatedAt;

    /**
     * Create shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['type', 'carrier_id', 'sender', 'receiver', 'lines', 'carrier_options']);

        return $this->client->createShipment($payload);
    }

    /**
     * Update Shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['receiver', 'lines']);

        return $this->client->updateShipment($this->id, $payload);
    }

    /**
     * Update the state of a shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateState(): array
    {
        return $this->client->updateShipmentState($this->id, $this->state);
    }

    /**
     * Archive shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function archive(): array
    {
        return $this->client->archiveShipment($this->id);
    }
}
