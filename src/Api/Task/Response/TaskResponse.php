<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Response;

class TaskResponse
{
    public function __construct(
        public readonly int $id,
        public readonly string $uuid,
        public readonly string $title,
        public readonly string $description,
        public readonly float $price,
        /**
         * @var array{
         *     type: int,
         *     triggerDate: string,
         *     isComingUp: bool
         * }
         */
        public readonly array $deadline,
        public readonly array $worker,
        /** array{currency: Currency, id: int} */
        public readonly array $currency,
        public readonly int $state,
    ) {
    }
}
