<?php

declare(strict_types=1);

namespace Vship\Util;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Tree\Message\Messages;
use CuyZ\Valinor\MapperBuilder;
use Vship\Exceptions\UnexpectedResponseSchemaException;

abstract class Util
{
    /**
     * @template T
     *
     * @param  class-string<T>  $targetClass  , the class to map to
     * @return T
     *
     * @throws UnexpectedResponseSchemaException
     */
    public static function convertToVshipObject(string $targetClass, array $data): object
    {
        try {
            $mapper = (new MapperBuilder)->enableFlexibleCasting()->mapper();
            $data = $mapper->map($targetClass, $data);
        } catch (MappingError $error) {
            throw new UnexpectedResponseSchemaException(previous: $error);
        }

        return $data;
    }

    /**
     * @template T
     *
     * @param  class-string<T>  $targetClass  , the class to map to
     * @param  array  $data
     * @return array<T>
     */
    public static function convertToVshipObjectCollection($targetClass, $data): mixed
    {
        $result = [];
        try {
            $mapper = (new MapperBuilder)->enableFlexibleCasting()->mapper();
            foreach ($data as $key => $datum) {
                $result[] = $mapper->map($targetClass, $datum);
            }
        } catch (MappingError $error) {
            $messages = Messages::flattenFromNode($error->node());

            // If only errors are wanted, they can be filtered
            $errorMessages = $messages->errors();

            foreach ($errorMessages as $message) {
                var_dump($message);
            }
        }

        return $result;
    }
}
