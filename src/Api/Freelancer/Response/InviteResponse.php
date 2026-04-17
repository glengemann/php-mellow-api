<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancer\Response;

readonly class InviteResponse
{
    public function __construct(
        public string $uuid,
        public int $freelancerId,
    ) {
    }
}
