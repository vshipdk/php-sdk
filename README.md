# vShip API PHP SDK (1.0.0)

<a href="https://packagist.org/packages/vshipdk/php-sdk"><img src="https://img.shields.io/packagist/dt/vshipdk/php-sdk" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/vshipdk/php-sdk"><img src="https://img.shields.io/packagist/v/vshipdk/php-sdk" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/vshipdk/php-sdk"><img src="https://img.shields.io/packagist/l/vshipdk/php-sdk" alt="License"></a>

## Introduction

This package provides basic interface to interact with the vShip API.

## Documentation

### Installation

To install the SDK in your project you need to require the package via composer:

```bash
composer require vshipdk/php-sdk
```

### Basic Usage

Initialize vShip client:

```php
    $client = new \Vship\Client(
        apiKey: { Your API key }
    );
```

Send a request through the client:

```php
    $client->getCountries();

    $client->getCarrier('car_2IGXIoELZX4Bga45tOxo52sbpJY');
```

<br>

Send a request with query parameters through the client:

```php
    $client->getCarriers([
        'filter[name]' => 'Carrier name',
    ]);
```

<br>

Send a request with body to create API resource through the client:

```php
    $response = $client->createOrganisation([
        'name' => 'test 5222ee5511232ff31rr33',
        'vat_number' => '123423rr4 ',
        'company_number' => 'bhifgrvbhief',
        'vat_registered' => false,
        'currency' => 'EUR',
        'timezone' => 'Europe/Copenhagen',
        'settings' => [],
    ]);
```



## API Reference

<br>

## vShip client

# Carriers

> [Get All Carriers](https://api-dev.vship.dev/docs.html#/paths/v1-carrier/get)

```php
    $client->getCarriers(array queryParameters = []): Carrier[]
```

> [Get Single Carrier](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-carrier/get)

```php
    $client->getCarrier(string $carrierId): Carrier
```

> [Create Carrier](https://api-dev.vship.dev/docs.html#/paths/v1-carrier/post)

```php
    $client->createCarrier(array $payload): Carrier
```

> [Update Carrier](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-carrier/patch)

```php
    $client->updateCarrier(string $carrierId, array $payload): Carrier
```

> [Delete Carrier](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-carrier/delete)

```php
    $client->deleteCarrier(string $carrierId): Carrier
```

# Carrier Accounts


> [Get All Carrier Accounts](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-account/get)

```php
    $client->getCarrierAccounts(array $queryParameters = []): CarrierAccount[]
```

> [Get Single Carrier Account](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-account-carrierAccount/get)

```php
    $client->getCarrierAccount(string $carrierAccountId): CarrierAccount
```

> [Create Carrier Account](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-account/post)

```php
    $client->createCarrierAccount(array $payload): CarrierAccount
```

> [Update Carrier Account](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-account-carrierAccount/patch)

```php
    $client->updateCarrierAccount(string $carrierAccountId, array $payload): CarrierAccount
```

> [Delete Carrier Account](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-account-carrierAccount/delete)

```php
    $client->deleteCarrierAccount(string $carrierAccountId): CarrierAccount
```

> [Get Carrier Account Fields](https://api-dev.vship.dev/docs.html#/paths/v1-carrier-account-fields-carrierCode/get)

```php
    $client->getCarrierAccountFields(string $carrierCode): CarrierAccountFields
```

# Countries

> [Get All Countries](https://api-dev.vship.dev/docs.html#/paths/v1-country/get)

```php
    $client->getCountries(): Country
```

# Labels

> [Fetch or/and print shipment labels](https://api-dev.vship.dev/docs.html#/paths/v1-label-shipment/get)

```php
    $client->fetchPrintShipmentLabel(string $shipmentId, array $parameters): Label
```

# Organisation Objects

> [Get All Organisation Objects](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-object/get)

```php
    $client->getOrganisationObjects(array $queryParameters = []): OrganisationObject[]
```

> [Get Single Organisation Object](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-object-object/get)

```php
    $client->getOrganisationObject(string $organisationObjectId): OrganisationObject
```

> [Create Organisation Object](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-object/post)

```php
    $client->createOrganisationObject(array $payload): OrganisationObject
```

> [Update Organisation Object](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-object-object/patch)

```php
    $client->updateOrganisationObject(string $organisationObjectId, array $payload): OrganisationObject
```

> [Delete Organisation Object](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-object-object/delete)

```php
    $client->deleteOrganisationObject(string $organisationObjectId): OrganisationObject
```

# Organisations

> [Get All Organisation](https://api-dev.vship.dev/docs.html#/paths/v1-organisation/get)

```php
    $client->getOrganisations(array $queryParameters = []): Organisation[]
```

> [Get Single Organisation](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-organisation/get)

```php
    $client->getOrganisation(string $organisationId): Organisation
```

> [Create Organisation](https://api-dev.vship.dev/docs.html#/paths/v1-organisation/post)

```php
    $client->createOrganisation(array $payload): Organisation
```

> [Update Organisation](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-organisation/patch)

```php
    $client->updateOrganisation(string $organisationId, array $payload): Organisation
```

> [Delete Organisation](https://api-dev.vship.dev/docs.html#/paths/v1-organisation-organisation/delete)

```php
    $client->deleteOrganisation($organisationId): Organisation
```

# Shipments

> [Get All Shipments](https://api-dev.vship.dev/docs.html#/paths/v1-shipment/get)

```php
    $client->getShipments(array $queryParameters = []): Shipment[]
```

> [Create Shipment](https://api-dev.vship.dev/docs.html#/paths/v1-shipment/post)

```php
    $client->createShipment(array $payload): Shipment
```

> [Update Shipment](https://api-dev.vship.dev/docs.html#/paths/v1-shipment-shipment/patch)

```php
    $client->updateShipment(string $shipmentId, array $payload): Shipment
```

> [Update Shipment State](https://api-dev.vship.dev/docs.html#/paths/v1-shipment-shipment--update-state--state/post)

```php
    $client->updateShipmentState(string shipmentId, string $shipmentState): Shipment
```

> [Archive Shipment](https://api-dev.vship.dev/docs.html#/paths/v1-shipment-archive-shipment/patch)

```php
    $client->archiveShipment(string $shipmentId): Shipment
```

# Users

> [Get All Users](https://api-dev.vship.dev/docs.html#/paths/v1-user/get)

```php
    $client->getUsers(array $queryParameters = []): User[]
```

> [Get Single User](https://api-dev.vship.dev/docs.html#/paths/v1-user-user/get)

```php
    $client->getUser(string $userId): User
```

# Consolidate Invoices

> [Create Consolidate Invoice](https://api-dev.vship.dev/docs.html#/paths/v1-invoices-consolidate/post)

```php
    $client->createConsolidateInvoice(array $payload): Invoice
```
