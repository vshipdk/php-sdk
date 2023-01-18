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

<br>

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



## API Reference

<br>

## Shippii client

# Carriers

> [Get All Carriers](https://api.shippii.dev/docs.html#/paths/v1-carrier/get)

```php
    $shippii->getCarriers(array queryParameters = []): Carrier[]
```

> [Get Single Carrier](https://api.shippii.dev/docs.html#/paths/v1-carrier-carrier/get)

```php
    $shippii->getCarrier(string $carrierId): Carrier
```

> [Create Carrier](https://api.shippii.dev/docs.html#/paths/v1-carrier/post)

```php
    $shippii->createCarrier(array $payload): Carrier
```

> [Update Carrier](https://api.shippii.dev/docs.html#/paths/v1-carrier-carrier/patch)

```php
    $shippii->updateCarrier(string $carrierId, array $payload): Carrier
```

> [Delete Carrier](https://api.shippii.dev/docs.html#/paths/v1-carrier-carrier/delete)

```php
    $shippii->deleteCarrier(string $carrierId): Carrier
```

# Carrier Accounts


> [Get All Carrier Accounts](https://api.shippii.dev/docs.html#/paths/v1-carrier-account/get)

```php
    $shippii->getCarrierAccounts(array $queryParameters = []): CarrierAccount[]
```

> [Get Single Carrier Account](https://api.shippii.dev/docs.html#/paths/v1-carrier-account-carrierAccount/get)

```php
    $shippii->getCarrierAccount(string $carrierAccountId): CarrierAccount
```

> [Create Carrier Account](https://api.shippii.dev/docs.html#/paths/v1-carrier-account/post)

```php
    $shippii->createCarrierAccount(array $payload): CarrierAccount
```

> [Update Carrier Account](https://api.shippii.dev/docs.html#/paths/v1-carrier-account-carrierAccount/patch)

```php
    $shippii->updateCarrierAccount(string $carrierAccountId, array $payload): CarrierAccount
```

> [Delete Carrier Account](https://api.shippii.dev/docs.html#/paths/v1-carrier-account-carrierAccount/delete)

```php
    $shippii->deleteCarrierAccount(string $carrierAccountId): CarrierAccount
```

> [Get Carrier Account Fields](https://api.shippii.dev/docs.html#/paths/v1-carrier-account-fields-carrierCode/get)

```php
    $shippii->getCarrierAccountFields(string $carrierCode): CarrierAccountFields
```

# Countries

> [Get All Countries](https://api.shippii.dev/docs.html#/paths/v1-country/get)

```php
    $shippii->getCountries(): Country
```

# Labels

> [Fetch or/and print shipment labels](https://api.shippii.dev/docs.html#/paths/v1-label-shipment/get)

```php
    $shippii->fetchPrintShipmentLabel(string $shipmentId, array $parameters): Label
```

# Organisation Objects

> [Get All Organisation Objects](https://api.shippii.dev/docs.html#/paths/v1-organisation-object/get)

```php
    $shippii->getOrganisationObjects(array $queryParameters = []): OrganisationObject[]
```

> [Get Single Organisation Object](https://api.shippii.dev/docs.html#/paths/v1-organisation-object-object/get)

```php
    $shippii->getOrganisationObject(string $organisationObjectId): OrganisationObject
```

> [Create Organisation Object](https://api.shippii.dev/docs.html#/paths/v1-organisation-object/post)

```php
    $shippii->createOrganisationObject(array $payload): OrganisationObject
```

> [Update Organisation Object](https://api.shippii.dev/docs.html#/paths/v1-organisation-object-object/patch)

```php
    $shippii->updateOrganisationObject(string $organisationObjectId, array $payload): OrganisationObject
```

> [Delete Organisation Object](https://api.shippii.dev/docs.html#/paths/v1-organisation-object-object/delete)

```php
    $shippii->deleteOrganisationObject(string $organisationObjectId): OrganisationObject
```

# Organisations

> [Get All Organisation](https://api.shippii.dev/docs.html#/paths/v1-organisation/get)

```php
    $shippii->getOrganisations(array $queryParameters = []): Organisation[]
```

> [Get Single Organisation](https://api.shippii.dev/docs.html#/paths/v1-organisation-organisation/get)

```php
    $shippii->getOrganisation(string $organisationId): Organisation
```

> [Create Organisation](https://api.shippii.dev/docs.html#/paths/v1-organisation/post)

```php
    $shippii->createOrganisation(array $payload): Organisation
```

> [Update Organisation](https://api.shippii.dev/docs.html#/paths/v1-organisation-organisation/patch)

```php
    $shippii->updateOrganisation(string $organisationId, array $payload): Organisation
```

> [Delete Organisation](https://api.shippii.dev/docs.html#/paths/v1-organisation-organisation/delete)

```php
    $shippii->deleteOrganisation($organisationId): Organisation
```

# Shipments

> [Get All Shipments](https://api.shippii.dev/docs.html#/paths/v1-shipment/get)

```php
    $shippii->getShipments(array $queryParameters = []): Shipment[]
```

> [Create Shipment](https://api.shippii.dev/docs.html#/paths/v1-shipment/post)

```php
    $shippii->createShipment(array $payload): Shipment
```

> [Update Shipment](https://api.shippii.dev/docs.html#/paths/v1-shipment-shipment/patch)

```php
    $shippii->updateShipment(string $shipmentId, array $payload): Shipment
```

> [Update Shipment State](https://api.shippii.dev/docs.html#/paths/v1-shipment-shipment--update-state--state/post)

```php
    $shippii->updateShipmentState(string shipmentId, string $shipmentState): Shipment
```

> [Archive Shipment](https://api.shippii.dev/docs.html#/paths/v1-shipment-archive-shipment/patch)

```php
    $shippii->archiveShipment(string $shipmentId): Shipment
```

# Users

> [Get All Users](https://api.shippii.dev/docs.html#/paths/v1-user/get)

```php
    $shippii->getUsers(array $queryParameters = []): User[]
```

> [Get Single User](https://api.shippii.dev/docs.html#/paths/v1-user-user/get)

```php
    $shippii->getUser(string $userId): User
```

# Consolidate Invoices

> [Create Consolidate Invoice](https://api.shippii.dev/docs.html#/paths/v1-invoices-consolidate/post)

```php
    $shippii->createConsolidateInvoice(array $payload): Invoice
```

<br>

#### Model properties

<br>

#### Carrier

```php
    public string|null $id = null;
    public Owner|null $owner = null;
    public string|null $name = null;
    public CarrierAccount|null $account = null;
    public string|null $code = null;
    public CarrierSettings|null $settings = null;
    public int|null $status = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
```

### Carrier Owner

```php
    public string|null $owner_type = null;
    public string|null $owner_id = null;
```

### Carrier Settings

```php
    public string|null $data = null;
```

<br>

#### CarrierAccount

```php
    public string|null $id = null;
    public string|null $name = null;
    /** @var CarrierAccountFields[]|null */
    public array|null $fields = null;
    public string|null $carrier_code = null;
    public string|null $status = null;
    public string|null $purpose = null;
    /** @var Carrier[]|null */
    public array|null $carriers = null;
    public string|null $expires_at = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
```

<br>

#### Country

```php
    public string|null $name = null;
    public string|null $official_state_name = null;
    public string|null $alpha_2_code = null;
    public string|null $alpha_3_code = null;
    public string|null $numeric_code = null;
```

<br>

#### Label

```php
    public string|null $id = null;
    public string|null $shipmentId = null;
    public string|null $format = null;
    public string|null $metadata = null;
    public Owner|null $owner = null;
    public string|null $url = null;
    public string|null $createdAt = null;
```

<br>

#### Organization

```php
    public string|null $id = null;
    public Owner|null $owner = null;
    public string|null $name = null;
    public string|null $vat_number = null;
    public string|null $company_number = null;
    public bool|null $vat_registered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public OrganisationSettings|null $settings = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
    /** @var Address[]|null */
    public array|null $addresses = null;
```

<br>

#### OrganisationObject

```php
    public string|null $id = null;
    public string|null $name = null;
    public Organisation|null $organisation = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public OrganisationObjectSettings|null $settings = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
    /** @var Address[]|null */
    public array|null $addresses = null;
```

<br>

#### Shipment

```php
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
```

<br>

#### User

```php
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
    public array $shipments;
    public float|null $discount;
    public array $senderData;
    public array $vatAgent;
    public string $invoiceLanguage;
    public string $declarationOfOrigin;
```
