<?php
declare(strict_types=1);

namespace Shippii\Models\Tag;

final class Tag
{
    public string|null $id = null;
    public string|null $name = null;
    public string|null $slug = null;
    public string|null $type = null;
    public int|null $order_column = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
}