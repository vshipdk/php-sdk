<?php
declare(strict_types=1);

namespace Shippii\Models\Country;

final class Country
{
    public string|null $name = null;
    public string|null $official_state_name = null;
    public string|null $alpha_2_code = null;
    public string|null $alpha_3_code = null;
    public string|null $numeric_code = null;
}
