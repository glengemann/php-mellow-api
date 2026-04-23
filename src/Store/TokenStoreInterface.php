<?php

declare(strict_types=1);

namespace Mellow\Store;

interface TokenStoreInterface
{
    public function getToken(): ?string;

    public function getRefreshToken(): ?string;

    public function save(string $token, string $refreshToken): void;
}
