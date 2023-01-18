<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Models\Invoice\Invoice;
use Shippii\Util\Util;

trait ManageInvoices
{
    /**
     * Create an invoice
     *
     * @param array $payload
     * @return Invoice
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createConsolidateInvoice(array $payload): Invoice
    {
        $response = $this->post('v1/invoices/consolidate', $payload)['data'];
        return Util::convertToShippiObject(Invoice::class, $response);
    }
}