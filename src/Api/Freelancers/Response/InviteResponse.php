<?php

declare(strict_types=1);

class InviteResponse
{
    public function __construct(
        public readonly string $uuid,
        public readonly int $freelancerId,
    ) {
    }
}
