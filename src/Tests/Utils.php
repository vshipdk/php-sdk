<?php

declare(strict_types=1);

namespace Vship\Tests;

class Utils
{
    public static function getFixture(string $path): string
    {
        return file_get_contents(__DIR__ . '/fixtures/' . $path);
    }
    public static function getFixtureJson(string $path): array
    {
        return json_decode(self::getFixture($path), true);
    }
}
