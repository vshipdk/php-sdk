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
     * @param class-string<T> $targetClass , the class to map to
     * @param array<string, mixed> $data
     * @return T
     *
     * @throws UnexpectedResponseSchemaException
     * @noinspection PhpDocSignatureInspection
     */
    public static function convertToVshipObject(string $targetClass, array $data): object
    {
        try {
            $mapper = self::createMapper();
            $data = $mapper->map($targetClass, $data);
        } catch (MappingError $error) {
            throw UnexpectedResponseSchemaException::fromMappingError($error);
        }

        return $data;
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $targetClass , the class to map to
     * @param array<int, array<string, mixed>> $data
     * @return array<T>
     * @throws UnexpectedResponseSchemaException
     * @noinspection PhpDocSignatureInspection
     */
    public static function convertToVshipObjectCollection(string $targetClass, array $data): array
    {
        $result = [];
        try {
            $mapper = self::createMapper();
            foreach ($data as $key => $datum) {
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
