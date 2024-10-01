<?php

namespace Shippii\Models\Address;

final class Address
{
    public ?string $id = null;

    // --
    public ?int $sequence = null;

    public ?string $before_normalization = null;

    public ?string $normalizer = null;

    public ?string $hash = null;

    public ?bool $is_default_of_this_type = null;

    public ?string $deleted_at = null;
    // --

    public ?string $addressable_type = null;

    public ?string $addressable_id = null;

    public ?int $type = null;

    public ?string $country_code = null;

    public ?string $city = null;

    public ?string $province = null;

    public ?string $county = null;

    public ?string $state_code = null;

    public ?string $post_code = null;

    public ?string $district = null;

    public ?string $line1 = null;

    public ?string $line2 = null;

    public ?string $line3 = null;

    public ?string $street_type = null;

    public ?string $street_name = null;

    public ?string $street_number = null;

    public ?string $floor = null;

    public ?string $door = null;

    public ?string $building = null;

    public ?string $mobile_phone_country_code = null;

    public ?string $mobile_phone = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;
}
