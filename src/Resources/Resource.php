<?php

declare(strict_types=1);

namespace Shippii\Resources;

use Shippii\Shippii;

class Resource
{
    /**
     * The resource attributes.
     */
    public array $attributes;

    /**
     * Shippii attribute.
     *
     * @var Shippii|null
     */
    protected Shippii $shippii;

    /**
     * Create a new resource instance.
     *
     * @return void
     */
    public function __construct(
        array $attributes,
        ?Shippii $shippii = null,
    ) {
        $this->attributes = $attributes;
        $this->shippii = $shippii;

        $this->fill();
    }

    /**
     * Fill the resource with the array of attributes.
     */
    protected function fill(): void
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }

    /**
     * Prepare a payload data.
     */
    protected function preparePayload(array $columns): array
    {
        $payload = [];
        foreach ($columns as $column) {
            $property = $this->camelCase($column);
            if ($this->$property !== null) {
                $payload[$column] = $this->$property;
            }
        }

        return $payload;
    }

    /**
     * Convert the key name to camel case.
     */
    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }
}
