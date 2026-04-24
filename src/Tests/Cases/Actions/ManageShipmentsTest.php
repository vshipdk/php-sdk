<?php

declare(strict_types=1);

namespace Cases\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vship\Actions\ManageShipments;
use Vship\Client;
use Vship\Exceptions\FailedActionException;
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

    private function mockClient(int $status, mixed $body): void
    {
        $mock = new MockHandler([
            new Response(status: $status, headers: [], body: is_array($body) ? json_encode($body) : $body),
        ]);

        $guzzleClient = new GuzzleClient(['handler' => $mock]);
        $this->client->setApiKey('test_secret', Client::SANDBOX_URL, $guzzleClient);
    }

    public function testCreateShipment(): void
    {
        $requestPayload = Utils::getFixtureJson('actions/shipment/create-request-200.json');
        $response = Utils::getFixtureJson('actions/shipment/create-response-200.json');

        $this->mockClient(201, $response);

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

    #[DataProvider('shipmentResponseProvider')]
    public function testGetShipment(string $fixture): void
    {
        $response = Utils::getFixtureJson($fixture);

        $this->mockClient(200, $response);

        $shipment = $this->client->getShipment($response['data']['id']);

        $this->assertInstanceOf(Shipment::class, $shipment);
        $this->assertEquals($response['data']['id'], $shipment->id);
        $this->assertNotNull($shipment->organisation_object);
        $this->assertCount(1, $shipment->organisation_object->addresses);
        $address = $shipment->organisation_object->addresses[0];
        $this->assertEquals($response['data']['organisation_object']['addresses'][0]['type'], $address->type);
        $this->assertEquals($response['data']['organisation_object']['addresses'][0]['line'], $address->line);
    }

    public static function shipmentResponseProvider(): array
    {
        return [
            ['actions/shipment/get-response-200-1.json'],
            ['actions/shipment/get-response-200-2.json'],
        ];
    }

    public function testCreateShipmentBringRejected(): void
    {
        $requestPayload = Utils::getFixtureJson('actions/shipment/create-request-200.json');
        $response = Utils::getFixture('actions/shipment/create-response-400.json');

        $this->mockClient(400, $response);

        $this->expectException(FailedActionException::class);
        try {
            $this->client->createShipment($requestPayload);
        } catch (FailedActionException $e) {
            $this->assertEquals(
                $response,
                $e->getMessage(),
            );
            $this->assertEquals(
                "Bring rejected the shipment.\nDanish postal codes must be 3 or 4 digits",
                implode(".\n", $e->messages),
            );
            throw $e;
        }
    }
}
