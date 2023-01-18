<?php
declare(strict_types=1);

namespace Shippii\Models\ActivityLog;

final class ActivityLog
{
    public string|null $id = null;
    public string|null $logName = null;
    public string|null $description = null;
    public string|null $severity = null;
    public string|null $type = null;
    public string|null $createdAt = null;
}