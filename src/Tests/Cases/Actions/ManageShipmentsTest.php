<?php

declare(strict_types=1);

namespace Cases\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Vship\Actions\ManageShipments;
use Vship\Client;
use Vship\Models\Shipment\Shipment;
use Vship\Models\Shipment\State;
use Vship\Tests\Traits\TestsWebhooks;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Client as GuzzleClient;
use Vship\Tests\Utils;

#[CoversClass(ManageShipments::class)]
class ManageShipmentsTest extends TestCase
{
    use TestsWebhooks;

    private ?Client $client = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client();
    }

    public function testCreateShipment(): void
    {
        $requestPayload = Utils::getFixtureJson('actions/shipment/create-request-200.json');
        $response = Utils::getFixtureJson('actions/shipment/create-response-200.json');

        $mock = new MockHandler([
            new Response(200, [], json_encode($response)),
        ]);

        $guzzleClient = new GuzzleClient(['handler' => $mock]);
        $this->client->setApiKey('test_secret', Client::SANDBOX_URL, $guzzleClient);

        $shipment = $this->client->createShipment($requestPayload);

        $this->assertInstanceOf(Shipment::class, $shipment);
        $this->assertEquals($response['data']['id'], $shipment->id);
        $this->assertEquals(State::from($response['data']['state']), $shipment->state);
        $this->assertEquals($response['data']['receiver']['id'], $shipment->receiver->id);
        $this->assertEquals($response['data']['receiver']['address']['id'], $shipment->receiver->address->id);
        $this->assertEquals($response['data']['label_download_url'], $shipment->label_download_url);
        $this->assertCount(count($response['data']['parcels']), $shipment->parcels);
        foreach ($response['data']['parcels'] as $index => $parcel) {
            $this->assertEquals($parcel['id'], $shipment->parcels[$index]->id);
            $this->assertEquals($parcel['sendable_reference'], $shipment->parcels[$index]->sendable_reference);
            $this->assertEquals($parcel['barcode'], $shipment->parcels[$index]->barcode);
            $this->assertEquals($parcel['carrier_number'], $shipment->parcels[$index]->carrier_number);
            $this->assertEquals($parcel['carrier_tracking_url'], $shipment->parcels[$index]->carrier_tracking_url);
            $this->assertEquals($parcel['label_download_url'], $shipment->parcels[$index]->label_download_url);
        }
    }
}
