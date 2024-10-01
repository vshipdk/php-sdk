<?php

declare(strict_types=1);

namespace Vship\SDK\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;

class Invoice extends Resource
{
    public array $shipments;

    public ?float $discount;

    public array $senderData;

    public array $vatAgent;

    public string $invoiceLanguage;

    public string $declarationOfOrigin;

    /**
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['shipments', 'discount', 'sender_data', 'vat_agent', 'invoice_language', 'declaration_of_origin']);

        return $this->client->createInvoice($payload);
    }
}
