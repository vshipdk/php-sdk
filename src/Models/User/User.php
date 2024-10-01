<?php

declare(strict_types=1);

namespace Vship\SDK\Models\User;

use Vship\SDK\Models\Organisation\Organisation;

final class User
{
    public ?string $id = null;

    public ?string $first_name = null;

    public ?string $last_name = null;

    public ?string $email = null;

    public ?string $mobile_e164 = null;

    public ?string $mobile_national = null;

    public ?string $mobile_raw = null;

    public ?string $role = null;

    public ?string $timezone = null;

    public ?string $locale = null;

    public ?string $created_at = null;

    public ?string $update_at = null;

    /** @var Organisation[]|null */
    public ?array $organisations = null;
}
