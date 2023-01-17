<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Invoice extends Resource
{
    public array $shipments;
    public float|null $discount;
    public array $senderData;
    public array $vatAgent;
    public string $invoiceLanguage;
    public string $declarationOfOrigin;

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['shipments', 'discount', 'sender_data', 'vat_agent', 'invoice_language', 'declaration_of_origin']);

        return $this->shippii->createInvoice($payload);
    }
}