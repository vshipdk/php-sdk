<?php

declare(strict_types=1);

namespace Cases\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Vship\Actions\ManageWebhooks;
use Vship\Client;
use Vship\Tests\Traits\TestsWebhooks;

#[CoversClass(ManageWebhooks::class)]

class ManageWebhooksTest extends TestCase
{
    use TestsWebhooks;

    private ?Client $client = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client('test_secret');
    }

    public function testCorrectPayload()
    {
        list($payload, $secret, $signature) = $this->getLabelsCreatedWebhook();
        $shipment = $this->client->handleWebhooks($payload, $signature, $secret);
        $this->assertInstanceOf(\Vship\Models\Shipment\Shipment::class, $shipment);
    }
}
