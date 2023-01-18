<?php

namespace Shippii\Util;

use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Tree\Message\Messages;

abstract class Util
{
    /**
     * @template T
     * @param class-string<T> $targetClass, the class to map to
     * @param array $data
     * @return T
     */
    public static function convertToShippiObject($targetClass, $data): mixed
    {
        try {
            $mapper = (new MapperBuilder)->enableFlexibleCasting()->mapper();
            $data = $mapper->map($targetClass, $data);
        } catch (MappingError $error) {
            $messages = Messages::flattenFromNode($error->node());

            // If only errors are wanted, they can be filtered
            $errorMessages = $messages->errors();

            foreach ($errorMessages as $message) {
                var_dump($message);
            }
        }

        return $data;
    }

    /**
     * @template T
     * @param class-string<T> $targetClass, the class to map to
     * @param array $data
     * @return array<T>
     */
    public static function convertToShippiObjectCollection($targetClass, $data): mixed
    {
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