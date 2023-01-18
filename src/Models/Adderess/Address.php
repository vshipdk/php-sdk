<?php
declare(strict_types=1);

namespace Shippii\Models\Adderess;

final class Address
{
    public string|null $id = null;
    public string|null $county = null;
    public string|null $countryCode = null;
    public string|null $city = null;
    public string|null $province = null;
    public string|null $stateCode = null;
    public string|null $postCode = null;
    public string|null $district = null;
    public string|null $line1 = null;
    public string|null $line2 = null;
    public string|null $line3 = null;
    public string|null $streetType = null;
    public string|null $streetName = null;
    public string|null $streetNumber = null;
    public string|null $floor = null;
    public string|null $door = null;
    public string|null $building = null;
    public string|null $mobilePhoneCountryCode = null;
    public string|null $mobilePhone = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
}