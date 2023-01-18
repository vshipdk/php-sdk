<?php

namespace Shippii\Models\Address;

final class Address
{
    public string|null $id = null;

    //--
    public int|null $sequence = null;
    public string|null $before_normalization = null;
    public string|null $normalizer = null;
    public string|null $hash = null;
    public bool|null $is_default_of_this_type = null;
    public string|null $deleted_at = null;
    //--
    
    public string|null $addressable_type = null;
    public string|null $addressable_id = null;
    public int|null $type = null;
    public string|null $country_code = null;
    public string|null $city = null;
    public string|null $province = null;
    public string|null $county = null;

    public string|null $state_code = null;
    public string|null $post_code = null;
    public string|null $district = null;
    public string|null $line1 = null;
    public string|null $line2 = null;
    public string|null $line3 = null;
    public string|null $street_type = null;
    public string|null $street_name = null;
    public string|null $street_number = null;
    public string|null $floor = null;
    public string|null $door = null;
    public string|null $building = null;
    public string|null $mobile_phone_country_code = null;
    public string|null $mobile_phone = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
}
