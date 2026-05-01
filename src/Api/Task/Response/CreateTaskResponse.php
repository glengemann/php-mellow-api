<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Response;

class CreateTaskResponse
{
    public function __construct(
        public readonly string $uuid,
    ) {
    }
}
