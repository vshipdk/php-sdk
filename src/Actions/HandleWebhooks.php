<?php

declare(strict_types=1);

namespace Vship\Actions;

use Vship\DTO\Webhook;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\SignatureVerificationException;
use Vship\Exceptions\UnexpectedResponseSchemaException;
use Vship\Util\Util;
use Vship\Util\Webhook as WebhookUtil;

trait HandleWebhooks
{
    /**
     * @throws FailedActionException
     * @throws UnexpectedResponseSchemaException
     * @throws SignatureVerificationException
     */
    public function handleWebhook(string $payload, string $headerSignature, string $secret): Webhook
    {
        $event = WebhookUtil::constructEvent($payload, $headerSignature, $secret);

        return new Webhook(
            type: $event->objectType->value,
            object: Util::convertToVshipObject(
                targetClass: $event->objectType->getClass(),
                data: $event->objectData,
            ),
        );
    }
}
