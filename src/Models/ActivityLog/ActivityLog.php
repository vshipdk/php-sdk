<?php
declare(strict_types=1);

namespace Shippii\Models\ActivityLog;

final class ActivityLog
{
    public string|null $id = null;
    public string|null $log_name = null;
    public string|null $description = null;
    public string|null $severity = null;
    public string|null $type = null;
    public string|null $created_at = null;
}