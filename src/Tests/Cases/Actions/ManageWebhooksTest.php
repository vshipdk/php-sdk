<?php

declare(strict_types=1);

namespace Cases\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Vship\Actions\HandleWebhooks;
use Vship\Client;
use Vship\Enum\WebhookType;
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

    public function testLabelsCreatedWebhook()
    {
        list($payload, $secret, $signature) = $this->getLabelsCreatedWebhook();
        $webhook = $this->client->handleWebhook($payload, $signature, $secret);
        $shipment = $webhook->object;
        $this->assertInstanceOf(Shipment::class, $shipment);
        $this->assertEquals(WebhookType::LABELS_CREATED, $webhook->type);
    }

    public function testLabelsFailedWebhook()
    {
        list($payload, $secret, $signature) = $this->getLabelsFailedWebhook();
        $webhook = $this->client->handleWebhook($payload, $signature, $secret);
        $shipment = $webhook->object;
        $this->assertInstanceOf(Shipment::class, $shipment);
        $this->assertEquals(WebhookType::LABELS_ERROR, $webhook->type);
        $this->assertEquals('WeightInKg must be greater than 0', $shipment->error[0]->carrierMessage);
    }
}
