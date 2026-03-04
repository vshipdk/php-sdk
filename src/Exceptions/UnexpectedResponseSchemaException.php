<?php

declare(strict_types=1);

namespace Vship\Exceptions;

use CuyZ\Valinor\Mapper\Tree\Message\NodeMessage;
use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Tree\Message\Formatter\MessageMapFormatter;
use CuyZ\Valinor\Mapper\Tree\Message\Formatter\TranslationMessageFormatter;
use CuyZ\Valinor\Mapper\Tree\Message\Messages;
use Exception;

class UnexpectedResponseSchemaException extends Exception
{
    public function __construct(string $message = '', int $code = 0, ?MappingError $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function fromMappingError(MappingError $error): self
    {
        return new self(message: $error->getMessage(), previous: $error);
    }

    public function __toString(): string
    {
        $str = '';
        $error = $this->getPrevious();
        if ($error instanceof MappingError) {
            // Get flatten list of all messages through the whole nodes tree
            $messages = Messages::flattenFromNode(
                $error->node(),
            ); // Formatters can be added and will be applied on all messages
            $messages = $messages->formatWith(
                new MessageMapFormatter([]),
                (new TranslationMessageFormatter())
                    ->withTranslations([
                        // …
                    ]),
            );
            $str = array_reduce(
                $messages->toArray(),
                fn(string $carry, NodeMessage $message): string => $carry . $message . PHP_EOL,
                '',
            );
        }

        return $str . parent::__toString();
    }
}
