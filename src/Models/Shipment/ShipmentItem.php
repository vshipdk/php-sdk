<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Shipment;

final class ShipmentItem
{
    public ?string $id = null;

    public ?string $organisation_id = null;

    public ?string $name = null;

    public ?string $sku = null;

    public ?string $ean = null;

    public ?string $tariff_code = null;

    public ?string $harmonization_code = null;

    public ?string $country_of_origin = null;

    public ?string $image_url = null;

    public ?string $country_of_declaration = null;

    public ?string $value = null;

    public ?string $weight_in_grams = null;

    public ?string $volume = null;

    public ?string $data = null;

    public ?string $hash = null;

    public ?string $tariff_description = null;

    public ?string $last_used_at = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;
}
