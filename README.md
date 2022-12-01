# SHIPPII API v4 PHP SDK (0.2.0)

<a href="https://packagist.org/packages/shippii-tech/php-sdk"><img src="https://img.shields.io/packagist/dt/shippii-tech/php-sdk" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/shippii-tech/php-sdk"><img src="https://img.shields.io/packagist/v/shippii-tech/php-sdk" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/shippii-tech/php-sdk"><img src="https://img.shields.io/packagist/l/shippii-tech/php-sdk" alt="License"></a>

## Introduction

This package provides an expressive interface for interacting with Shippii API v4.

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
```
Shippii client returns Resource\Resource instance when requests API resource.
<br><br>

Send a request with query parameters through the client:
```php 
    $shippii->listCarriers([
        'filter[name]' => 'Carrier name',
    ]);
```
Shippii client returns array that contains Resource\Resource instances and meta data when requests multiple API resources.
<br><br>

Send a request with body to create API resource through the client:
```php 
    $response = $shippii->createOrganisation([
    'id' => 'org_2IGCAq2gnsVaPzhLGSEH53ZaoTh',
    'name' => 'test 5222ee5511232ff31rr33',
    'vat_number' => '123423rr4 ',
    'company_number' => 'bhifgrvbhief',
    'vat_registered' => false,
    'currency' => 'EUR',
    'timezone' => 'Europe/Copenhagen',
    'settings' => [],
]);
```
Shippii client returns Resource\Resource instance when sends a request to create or update API resource.
<br><br>

Initialize Resource instance:
```php
    $carrierResource = new \Shippii\Resources\Carrier(
        attributes: ['id' => 'car_2IGXIoELZX4Bga45tOxo52sbpJY'],
        shippii: $shippii,
    );
```
<br>

Send a request through a resource:
```php
    $carrierResource->get()
```
<br>

Send a request with query parameters through a resource:
```php
    $shipmentResource->index([
        'filter[withArchived]' => 1,
    ]);
```
<br>

Send a request with body to create API resource:
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
<br>

## API Reference:
<br>

### Shippii client:
```php
    /Shippii/Shippii

    public function listCarriers(array $parameters = []): array;

    public function createCarrier(array $payload): Carrier;

    public function getCarrier(string $carrierId): Carrier;

    public function updateCarrier(string $carrierId, array $payload): Carrier;

    public function deleteCarrier(string $carrierId): void;

    public function listCarriersAccounts(array $parameters = []): array;

    public function createCarrierAccount(array $payload): CarrierAccount;

    public function getCarrierAccount(string $carrierAccountId): CarrierAccount;

    public function updateCarrierAccount(string $carrierAccountId, array $payload): CarrierAccount;

    public function deleteCarrierAccount(string $carrierAccountId): void;

    public function getCarrierAccountFields(string $carrierCode): CarrierAccount;

    public function getCountries(): array;

    public function fetchPrintShipmentLabel(string $shipmentId, array $parameters): array;

    public function listOrganisationObjects(array $parameters): array;

    public function createOrganisationObject(array $payload): OrganisationObject;

    public function getOrganisationObject(string $organisationObjectId): OrganisationObject;

    public function updateOrganisationObject(string $organisationObjectId, array $payload): OrganisationObject;

    public function deleteOrganisationObject(string $organisationObjectId): void;

    public function listOrganisations(array $parameters): array;
    
    public function createOrganisation(array $payload): Organisation;

    public function getOrganisation(string $organisationId): Organisation;
    
    public function updateOrganisation(string $organisationId, array $payload): Organisation;

    public function deleteOrganisation(string $organisationId): void;

    public function listUserShipments(array $parameters): array;

    public function createShipment(array $payload): Shipment;

    public function updateShipment(string $shipmentId, array $payload): Shipment;

    public function updateShipmentState(string $shipmentId, string $shipmentState): void;

    public function archiveShipment(string $shipmentId): void;

    public function listUsers(array $parameters): array;

    public function createUser(array $payload): User;

    public function getUser(string $userId): User;

    public function updateUser(string $userId, array $payload): User;

    public function deleteUser(string $userId): void;

    public function sendResetUserPasswordLink(array $payload): void;
```
<br>

#### Resources:
<br>

#### Carrier:
```php
    \Shippii\Resources\Carrier

    public string $id;
    public string|null $name = null;
    public string|null $code = null;
    public int|null $status = null;
    public string $carrierAccountId;
    public array|null $settings = null;
    public string|null $ownerType;
    public string|null $ownerId;
    public array|null $account;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array;

    public function create(): self;

    public function get(): self;

    public function update(): self;

    public function delete(): void;
```
<br>

#### CarrierAccount:
```php
    \Shippii\Resources\CarrierAccount

    public string $id;
    public string|null $carrierCode = null;
    public string|null $name = null;
    public string|null $purpose = null;
    public string|null $status = null;
    public string $organisationId;
    public array|null $data = null;
    public string|null $expiresAt = null;
    public array|null $fields;
    public array|null $carriers;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array;

    public function create(): self;

    public function get(): self;

    public function update(): self;

    public function delete(): void;

    public function getFields(): self;
```
<br>

#### Country:
```php
    \Shippii\Resources\Country

    public string|null $name;
    public string|null $officialStateName;
    public string|null $alpha2Code;
    public string|null $alpha3Code;
    public string|null $numericCode;

    public function index(): array;
```
<br>

#### Label:
```php
    \Shippii\Resources\Label

    public string|null $id;
    public string $shipmentId;
    public string|null $format;
    public string|null $metadata;
    public string|null $owner;
    public string|null $url;
    public string|null $createdAt;
    
    public function fetchPrintShipmentLabel(array $parameters): array;
```
<br>

#### Organization:
```php
    \Shippii\Resources\Organization

    public string $id;
    public string|null $name = null;
    public string|null $vatNumber = null;
    public string|null $companyNumber = null;
    public bool|null $vatRegistered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;

    public function index(array $parameters = []): array;

    public function create(): self;

    public function get(): self;

    public function update(): self;

    public function delete(): void;
```
<br>

#### OrganisationObject:
```php
    \Shippii\Resources\OrganisationObject

    public string $id;
    public string|null $name = null;
    public string $organisationId;
    public array $organisation;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array;

    public function create(): self;

    public function get(): self;

    public function update(): self;

    public function delete(): void;
```
<br>

#### Shipment:
```php
    \Shippii\Resources\Shipment

    public string $id;
    public int $type;
    public string $carrierId;
    public array $sender;
    public array|null $receiver = null;
    public array|null $lines = null;
    public array $carrierOptions;
    public string $state;
    public string|null $rateId;
    public string|null $creatorId;
    public string|null $creatorType;
    public string|null $sendableId;
    public string|null $sendableAddressId;
    public string|null $receivableId;
    public string|null $receivableAddressId;
    public string|null $sendableReference;
    public string|null $carrierIdentification;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array;

    public function create(): self;

    public function update(): self;

    public function updateState(): void;

    public function archive(): void;
```
<br>

#### User:
```php
    \Shippii\Resources\User

    public string|null $id;
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $email = null;
    public string|null $phone = null;
    public string|null $role = null;
    public string|null $timezone = null;
    public string|null $locale = null;
    public string|null $mobileRaw;
    public string|null $mobileE164;
    public string|null $mobileNational;
    public string|null $createdAt;
    public string|null $updateAt;

    public function index(array $parameters = []): array;

    public function create(): self;

    public function get(): self;

    public function update(): self;

    public function delete(): void;

    public function sendResetPasswordLink(): void;
```