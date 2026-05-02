<?php

declare(strict_types=1);

namespace Mellow\Store;

use Psr\Cache\CacheItemPoolInterface;

class Psr6TokenStore implements TokenStoreInterface
{
    public function __construct(
        private CacheItemPoolInterface $cachePool,
        private string $storageKey = 'mellow_credentials',
    ) {
    }

    public function getToken(): ?string
    {
        $credentials = $this->getCredentials();

        return $credentials['access_token'] ?? null;
    }

    public function getRefreshToken(): ?string
    {
        $credentials = $this->getCredentials();

        return $credentials['refresh_token'] ?? null;
    }

    public function save(string $token, string $refreshToken): void
    {
        $item = $this->cachePool->getItem($this->storageKey);
        $item->set([
            'access_token' => $token,
            'refresh_token' => $refreshToken,
        ]);
        $this->cachePool->save($item);
    }

    /**
     * @return array{access_token?: string, refresh_token?: string}
     */
    private function getCredentials(): array
    {
        $item = $this->cachePool->getItem($this->storageKey);

        if (false === $item->isHit()) {
            return [];
        }

        $data = $item->get();

        if (false === is_array($data)) {
            return [];
        }

        $credentials = [];

        if (is_string($data['access_token'] ?? null)) {
            $credentials['access_token'] = $data['access_token'];
        }

        if (is_string($data['refresh_token'] ?? null)) {
            $credentials['refresh_token'] = $data['refresh_token'];
        }

        return $credentials;
    }

    public function delete(): void
    {
        $this->cachePool->deleteItem($this->storageKey);
    }
}
