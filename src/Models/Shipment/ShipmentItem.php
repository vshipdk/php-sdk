<?php
declare(strict_types=1);

namespace Shippii\Models\Shipment;

final class ShipmentItem
{
    public string|null $id = null;
    public string|null $organisation_id = null;
    public string|null $name = null;
    public string|null $sku = null;
    public string|null $ean = null;
    public string|null $tariff_code = null;
    public string|null $harmonization_code = null;
    public string|null $country_of_origin = null;
    public string|null $image_url = null;
    public string|null $country_of_declaration = null;
    public string|null $value = null;
    public string|null $weight_in_grams = null;
    public string|null $volume = null;
    public string|null $data = null;
    public string|null $hash = null;
    public string|null $tariff_description = null;
    public string|null $last_used_at = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
}
