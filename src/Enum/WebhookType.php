<?php

declare(strict_types=1);

namespace Vship\Enum;

enum WebhookType: string
{
    case LABELS_CREATED = 'labels.created';
    case LABELS_ERROR = 'labels.error';
}
