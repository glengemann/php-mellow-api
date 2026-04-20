<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Response;

use Mellow\Api\Currency;

class TaskResponse
{
    public function __construct(
        //       "currency": {
        //        "currency": "EUR",
        //        "id": 3
        //      },
        public readonly Currency $currency,
    ) {
    }
}
