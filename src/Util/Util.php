<?php

declare(strict_types=1);

namespace Vship\Util;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use Vship\Exceptions\UnexpectedResponseSchemaException;

abstract class Util
{
    /**
     * @template T of object
     *
     * @param class-string<T> $targetClass
     * @param array<string, mixed> $data
     * @return T
     *
     * @throws UnexpectedResponseSchemaException
     */
    public static function convertToVshipObject(string $targetClass, array $data): object
    {
        try {
            $mapper = self::createMapper();

            return $mapper->map($targetClass, $data);
        } catch (MappingError $error) {
            throw UnexpectedResponseSchemaException::fromMappingError($error);
        }
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $targetClass
     * @param array<int, array<string, mixed>> $data
     * @return array<T>
     *
     * @throws UnexpectedResponseSchemaException
     */
    public static function convertToVshipObjectCollection(string $targetClass, array $data): array
    {
        $result = [];
        try {
            $mapper = self::createMapper();
            foreach ($data as $datum) {
                $result[] = $mapper->map($targetClass, $datum);
            }
        } catch (MappingError $error) {
            throw UnexpectedResponseSchemaException::fromMappingError($error);
        }

        return $result;
    }

    private static function createMapper(): TreeMapper
    {
        return (new MapperBuilder())
            ->enableFlexibleCasting()
            ->allowSuperfluousKeys()
            ->mapper();
    }
}
