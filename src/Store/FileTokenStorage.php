<?php

declare(strict_types=1);

namespace Mellow\Store;

class FileTokenStorage implements TokenStoreInterface
{
    public const string TMP_MELLOW_TOKEN_JSON = '/tmp/mellow_token.json';
    /** @var array{access_token: string, refresh_token: string} */
    private array $data = [];

    public function __construct()
    {
        if (true === file_exists(self::TMP_MELLOW_TOKEN_JSON)) {
            $this->data = json_decode(
                file_get_contents(self::TMP_MELLOW_TOKEN_JSON),
                true,
            );
        }
    }

    public function getToken(): ?string
    {
        return $this->data['access_token'] ?? null;
    }

    public function getRefreshToken(): ?string
    {
        return $this->data['refresh_token'] ?? null;
    }

    public function save(string $token, string $refreshToken): void
    {
        $this->data = [
            'access_token' => $token,
            'refresh_token' => $refreshToken,
        ];

        file_put_contents(
            self::TMP_MELLOW_TOKEN_JSON,
            json_encode($this->data, JSON_THROW_ON_ERROR),
            LOCK_EX,
        );
    }
}
