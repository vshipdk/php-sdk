<?php

declare(strict_types=1);

namespace Vship\Models\Shipment;

enum State: string
{
    case PAUSED = 'paused';
    case PROCESSING = 'processing';
    case CANCELLED = 'cancelled';
    case READY_FOR_PRINT = 'ready_for_print';
    case ON_HOLD = 'on_hold';
    case PRINTED = 'printed';
    case PENDING = 'pending';
    case RESUMED = 'resumed';

    public function canCancel(): bool
    {
        return match ($this) {
            self::READY_FOR_PRINT, self::ON_HOLD, self::PENDING => true,
            default => false,
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::PAUSED => 'Paused',
            self::PROCESSING => 'Processing',
            self::CANCELLED => 'Cancelled',
            self::READY_FOR_PRINT => 'Ready for print',
            self::ON_HOLD => 'On hold',
            self::PRINTED => 'Printed',
            self::PENDING => 'Pending',
            self::RESUMED => 'Resumed',
        };
    }
}
