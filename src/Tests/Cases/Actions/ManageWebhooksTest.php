<?php

declare(strict_types=1);

namespace Cases\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Vship\Actions\HandleWebhooks;
use Vship\Client;
use Vship\Models\Shipment\Shipment;
use Vship\Tests\Traits\TestsWebhooks;

#[CoversClass(HandleWebhooks::class)]

class ManageWebhooksTest extends TestCase
{
    use TestsWebhooks;

    private ?Client $client = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client('test_secret');
    }

    public function testWithCorrectPayload()
    {
        list($payload, $secret, $signature) = $this->getLabelsCreatedWebhook();
        $webhook = $this->client->handleWebhook($payload, $signature, $secret);
        $shipment = $webhook->object;
        $this->assertInstanceOf(Shipment::class, $shipment);
        $this->assertEquals('shipment', $webhook->type);
    }
}
