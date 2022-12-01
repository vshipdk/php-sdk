# SHIPPII API v4 PHP SDK (0.2.0)

<a href="https://packagist.org/packages/shippii-tech/php-sdk"><img src="https://img.shields.io/packagist/dt/shippii-tech/php-sdk" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/shippii-tech/php-sdk"><img src="https://img.shields.io/packagist/v/shippii-tech/php-sdk" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/shippii-tech/php-sdk"><img src="https://img.shields.io/packagist/l/shippii-tech/php-sdk" alt="License"></a>

## Official Documentation

### Installation

To install the SDK in your project you need to require the package via composer:

```bash
composer require shippii-tech/php-sdk
```

### Upgrading

When upgrading to a new major version of SHIPPII API v4 PHP SDK, it's important that you carefully review [the upgrade guide](https://github.com/Shippii-Tech/php-sdk/blob/master/UPGRADE.md).

### Basic Usage

Initialize Shippii client:
```php
    $shippii = new \Shippii\Shippii(
        apiKey: { Your API key }, 
        apiHost: { API host },
    );
```

Send a request through the client:
```php
    $shippii->getCarrier('car_2IGXIoELZX4Bga45tOxo52sbpJY');
    
    $shippii->listCarriers('filter[withArchived]=1');
```

Initialize Resource:
```php
    $carrierResource = new \Shippii\Resources\Carrier(
        attributes: ['id' => 'car_2IGXIoELZX4Bga45tOxo52sbpJY'],
        shippii: $shippii,
    );
```

Send a request through a resource:
```php
    $carrierResource->get()
```

Send query parameters through a resource:
```php
    $shipmentResource->index([
        'filter[withArchived]' => 1,
    ]);
```

Send a request to create API resource:
```php
    $resource = new OrganisationObject(
        attributes: [
            'id' => 'obj_2IH2viqHnZomAtz4iHmzCwTGgJm',
            'name' => 'test 123',
            'organisation_id' => 'org_2IGiLMvDCeGR2DioJmhyHxK7qJR',
            'currency' => 'USD',
            'timezone' => 'Europe/Paris',
            'settings' => [],
        ],
        shippii: $shippii,
    );

    $resource->create();
```
### API Reference:
#### SHIPPII CLIENT:
```php
    public function listCarriers(string $parameters);

    public function createCarrier(array $payload);

    public function getCarrier(string $carrierId);

    public function updateCarrier(string $carrierId, array $payload);

    public function deleteCarrier(string $carrierId);

    public function listCarriersAccounts(string $parameters);

    public function createCarrierAccount(array $payload);

    public function getCarrierAccount(string $carrierAccountId);

    public function updateCarrierAccount(string $carrierAccountId, array $payload);

    public function deleteCarrierAccount(string $carrierAccountId);

    public function getCarrierAccountFields(string $carrierCode);

    public function getCountries();

    public function fetchPrintShipmentLabel(string $shipmentId, string $parameters);

    public function listOrganisationObjects(string $parameters);

    public function createOrganisationObject(array $payload);

    public function getOrganisationObject(string $organisationObjectId);

    public function updateOrganisationObject(string $organisationObjectId, array $payload);

    public function deleteOrganisationObject(string $organisationObjectId);

    public function listOrganisations(string $parameters);

    public function createOrganisation(array $payload);

    public function getOrganisation(string $organisationId);
    
    public function updateOrganisation(string $organisationId, array $payload);

    public function deleteOrganisation(string $organisationId);

    public function listUserShipments(string $parameters);

    public function createShipment(array $payload);

    public function updateShipment(string $shipmentId, array $payload);

    public function updateShipmentState(string $shipmentId, string $shipmentState);

    public function archiveShipment(string $shipmentId);

    public function listUsers(string $parameters);

    public function createUser(array $payload);

    public function getUser(string $userId);

    public function updateUser(string $userId, array $payload);

    public function deleteUser(string $userId);

    public function sendResetUserPasswordLink(array $payload);
```

#### RESOURCES:
#### Carrier:
```php
    public string $id;
    public string|null $name = null;
    public string|null $code = null;
    public int|null $status = null;
    public string $carrierAccountId;
    public array|null $settings = null;

    public function index(array $parameters = []);

    public function create();

    public function get();

    public function update();

    public function delete();
```

#### CarrierAccount:
```php
    public string $id;
    public string|null $carrierCode = null;
    public string|null $name = null;
    public string|null $purpose = null;
    public string|null $status = null;
    public string $organisationId;
    public array|null $data = null;
    public string|null $expiresAt = null;

    public function index(array $parameters = []);

    public function create();

    public function get();

    public function update();

    public function delete();

    public function getFields();
```

#### Country:
```php
    public function index();
```

#### Label:
```php
    public string $shipmentId;

    public function fetchPrintShipmentLabel(array $parameters);
```
#### Organization:
```php
    public string $id;
    public string|null $name = null;
    public string|null $vatNumber = null;
    public string|null $companyNumber = null;
    public bool|null $vatRegistered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;

    public function index(array $parameters = []);

    public function create();

    public function get();

    public function update();

    public function delete();
```
#### OrganisationObject:
```php
    public string $id;
    public string|null $name = null;
    public string $organisationId;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;

    public function index(array $parameters = []);

    public function create();

    public function get();

    public function update();

    public function delete();
```
#### Shipment:
```php
    public string $id;
    public int $type;
    public string $carrierId;
    public array $sender;
    public array|null $receiver = null;
    public array|null $lines = null;
    public array $carrierOptions;
    public string $state;

    public function index(array $parameters = []);

    public function create();

    public function update();

    public function updateState();

    public function archive();
```
#### User:
```php
    public string|null $id;
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $email = null;
    public string|null $phone = null;
    public string|null $role = null;
    public string|null $timezone = null;
    public string|null $locale = null;

    public function index(array $parameters = []);

    public function create();

    public function get();

    public function update();

    public function delete();

    public function sendResetPasswordLink();
```