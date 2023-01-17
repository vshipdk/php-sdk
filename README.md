# SHIPPII API v4 PHP SDK (0.3.1)

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
        apiKey: { Your API key }
    );
```

Send a request through the client:

```php
    $shippii->getCountries();

    $shippii->getCarrier('car_2IGXIoELZX4Bga45tOxo52sbpJY');
```

<br>

Send a request with query parameters through the client:

```php
    $shippii->getCarriers([
        'filter[name]' => 'Carrier name',
    ]);
```

Shippii client returns array that contains Resource\Resource instances and meta data when requests multiple API resources.
<br><br>

Send a request with body to create API resource through the client:

```php
    $response = $shippii->createOrganisation([
        'name' => 'test 5222ee5511232ff31rr33',
        'vat_number' => '123423rr4 ',
        'company_number' => 'bhifgrvbhief',
        'vat_registered' => false,
        'currency' => 'EUR',
        'timezone' => 'Europe/Copenhagen',
        'settings' => [],
    ]);
```

<br>

Initialize Resource instance:

```php
    $carrierResource = new \Shippii\Resources\Carrier(
        attributes: ['id' => 'car_2IGXIoELZX4Bga45tOxo52sbpJY'],
        shippii: $shippii,
    );
```

<br>

Send a request with body to create API resource:

```php
    $resource = new OrganisationObject(
        attributes: [
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

```php
    $resource = new OrganisationObject([], $shippii);
    $resource->name = "Object Name";
    $resource->organisation_id = "org_2IGiLMvDCeGR2DioJmhyHxK7qJR";
    $resource->currency = "EUR";
    $resource->timezone = "Europe/Copenhagen";

    $resource->create();
```

<br>

## API Reference

<br>

### Shippii client

```php
    /Shippii/Shippii

    public function getCarriers(array $parameters = []): array;

    public function getCarrier(string $carrierId): Carrier;

    public function createCarrier(array $payload): array;

    public function updateCarrier(string $carrierId, array $payload): array;

    public function deleteCarrier(string $carrierId): array;

    public function getCarrierAccounts(array $parameters = []): array;

    public function getCarrierAccount(string $carrierAccountId): CarrierAccount;

    public function createCarrierAccount(array $payload): array;

    public function updateCarrierAccount(string $carrierAccountId, array $payload): array;

    public function deleteCarrierAccount(string $carrierAccountId): array;

    public function getCarrierAccountFields(string $carrierCode): array;

    public function getCountries(): array;

    public function fetchPrintShipmentLabel(string $shipmentId, array $parameters): array;

    public function getOrganisationObjects(array $parameters = []): array;

    public function getOrganisationObject(string $organisationObjectId): OrganisationObject;

    public function createOrganisationObject(array $payload): array;

    public function updateOrganisationObject(string $organisationObjectId, array $payload): array;

    public function deleteOrganisationObject(string $organisationObjectId): array;

    public function getOrganisations(array $parameters = []): array;

    public function getOrganisation(string $organisationId): Organisation;
    
    public function createOrganisation(array $payload): array;

    public function updateOrganisation(string $organisationId, array $payload): array;

    public function deleteOrganisation(string $organisationId): array;

    public function getShipments(array $parameters = []): array;

    public function createShipment(array $payload): array;

    public function updateShipment(string $shipmentId, array $payload): array;

    public function updateShipmentState(string $shipmentId, string $shipmentState): array;

    public function archiveShipment(string $shipmentId): array;

    public function getUsers(array $parameters = []): array;

    public function getUser(string $userId): User;

    public function createUser(array $payload): array;

    public function updateUser(string $userId, array $payload): array;

    public function deleteUser(string $userId): array;

    public function sendResetUserPasswordLink(array $payload): void;

    public function createInvoice(array $payload): array;
```

<br>

#### Resources

<br>

#### Carrier

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

    public function create(): array;

    public function update(): array;

    public function delete(): array;
```

<br>

#### CarrierAccount

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

    public function create(): array;

    public function update(): array;

    public function delete(): array;

    public function getFields(): array;
```

<br>

#### Country

```php
    \Shippii\Resources\Country

    public string|null $name;
    public string|null $officialStateName;
    public string|null $alpha2Code;
    public string|null $alpha3Code;
    public string|null $numericCode;
```

<br>

#### Label

```php
    \Shippii\Resources\Label

    public string|null $id;
    public string $shipmentId;
    public string|null $format;
    public string|null $metadata;
    public string|null $owner;
    public string|null $url;
    public string|null $createdAt;
```

<br>

#### Organization

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

    public function create(): array;

    public function update(): array;

    public function delete(): array;
```

<br>

#### OrganisationObject

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

    public function create(): array;

    public function update(): array;

    public function delete(): array;
```

<br>

#### Shipment

```php
    \Shippii\Resources\Shipment

    public string $id;
    public int $type;
    public string|null $carrierId;
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

    public function create(): array;

    public function update(): array;

    public function updateState(): array;

    public function archive(): array;
```

<br>

#### User

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
```

<br>

#### Invoice

```php
    \Shippii\Resources\Invoice

    public array $shipments;
    public float|null $discount;
    public array $senderData;
    public array $vatAgent;
    public string $invoiceLanguage;
    public string $declarationOfOrigin;

    public function create(): array;
```
