<?php

declare(strict_types=1);

namespace Vship\SDK\Models\ActivityLog;

final class ActivityLog
{
    public ?string $id = null;

    public ?string $log_name = null;

    public ?string $description = null;

    public ?string $severity = null;

    public ?string $type = null;

    public ?string $created_at = null;
}
