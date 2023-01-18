<?php
declare(strict_types=1);

namespace Shippii\Models\Tag;

final class Tag
{
    public string|null $id = null;
    public string|null $name = null;
    public string|null $slug = null;
    public string|null $type = null;
    public int|null $orderColumn = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
}