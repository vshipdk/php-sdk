<?php

namespace Shippii\Util;

use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Tree\Message\Messages;

abstract class Util
{
    /**
     * Converts a response from the Shippii API to the corresponding PHP object.
     *
     * @param array $response the response from the Shippii API
     * @param array $options
     *
     * @return array
     */
    public static function convertToShippiObject($targetClass, $data)
    {
        try {
            $mapper = (new MapperBuilder)->mapper();

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

    public static function convertToShippiObjectCollection($targetClass, $data)
    {
        $mapper = (new MapperBuilder)->mapper();
        foreach ($data as $key => $datum) {
            $result[] = $mapper->map($targetClass, $datum);
        }

        return $result;
    }
}