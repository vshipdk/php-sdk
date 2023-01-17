<?php
declare(strict_types=1);

namespace Shippii\Actions;

trait ManageInvoices
{
    /**
     * Create an invoice
     *
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createInvoice(array $payload): array
    {
        return $this->post('v1/invoices/consolidate', $payload);
    }
}