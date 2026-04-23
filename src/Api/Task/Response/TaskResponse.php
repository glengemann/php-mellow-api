<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Response;

use Mellow\Api\Currency;

class TaskResponse
{
    public function __construct(
        /** array{currency: Currency, id: int} */
        public readonly array $currency,
        public readonly int $state,
    ) {
    }
}
