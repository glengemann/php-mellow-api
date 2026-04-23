<?php

declare(strict_types=1);

namespace Mellow\Api\Login\Response;

final readonly class Credential
{
    public function __construct(
        public readonly string $token,
        public readonly string $refreshToken,
    ) {
    }
}
