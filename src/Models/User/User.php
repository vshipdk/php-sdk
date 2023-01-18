<?php
declare(strict_types=1);

namespace Shippii\Models\User;

use Shippii\Models\Organisation\Organisation;

final class User
{
    public string|null $id = null;
    public string|null $first_name = null;
    public string|null $last_name = null;
    public string|null $email = null;
    public string|null $mobile_e164 = null;
    public string|null $mobile_national = null;
    public string|null $mobile_raw = null;
    public string|null $role = null;
    public string|null $timezone = null;
    public string|null $locale = null;
    public string|null $created_at = null;
    public string|null $update_at = null;
    /** @var Organisation[]|null  */
    public array|null $organisations = null;
}