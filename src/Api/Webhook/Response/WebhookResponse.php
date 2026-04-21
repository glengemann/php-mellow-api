<?php

declare(strict_types=1);

namespace Mellow\Api\Webhook\Response;

class WebhookResponse
{
    public function __construct(
        public string $url,
        /** 'enabled' | 'disabled' */
        public string $status,
        public string $secret,
        public string $lastTriggered,
        public string $lastError,
    ) {
    }
}
