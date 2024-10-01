<?php

declare(strict_types=1);

namespace Shippii\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;

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

        return $this->shippii->createInvoice($payload);
    }
}
