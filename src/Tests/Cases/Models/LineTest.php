<?php

declare(strict_types=1);

namespace Vship\Tests\Cases\Models;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vship\Exceptions\UnexpectedResponseSchemaException;
use Vship\Models\Line\Line;
use Vship\Util\Util;

#[CoversClass(Line::class)]
class LineTest extends TestCase
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws UnexpectedResponseSchemaException
     */
    #[DataProvider('totalValueProvider')]
    public function testTotalValueMapping(array $data, int|float|null $expected): void
    {
        $line = Util::convertToVshipObject(Line::class, $data);

        $this->assertSame($expected, $line->total_value);
    }

    /**
     * @return array<string, array{array<string, mixed>, int|float|null}>
     */
    public static function totalValueProvider(): array
    {
        return [
            'int stays int' => [['total_value' => 500], 500],
            'decimal float' => [['total_value' => 2398.4], 2398.4],
            'whole float maps to int' => [['total_value' => 500.0], 500],
            'null' => [['total_value' => null], null],
            'missing' => [[], null],
        ];
    }
}
