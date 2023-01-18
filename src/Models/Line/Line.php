<?php
declare(strict_types=1);

namespace Shippii\Models\Line;

final class Line
{
    public string|null $id = null;
    public string|null $name = null;
    public string|null $sku = null;
    public float|null $qty = null;
    public float|null $weight = null;
    public float|null $total_weight = null;
    public float|null $volume = null;
    public float|null $total_volume = null;
    public string|null $tariff_code = null;
    public string|null $harmonization_code = null;
    public string|null $country_of_origin = null;
    public string|null $country_of_declaration = null;
}