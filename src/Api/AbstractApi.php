<?php

declare(strict_types=1);

namespace Mellow\Api;

use Mellow\Client;
use Mellow\ResponseConverter;
use Psr\Http\Message\ResponseInterface;

class AbstractApi
{
    public function __construct(
        private readonly Client $client,
        protected readonly ResponseConverter $responseConverter = new ResponseConverter(),
    ) {
    }

    protected function get(string $url, array $headers = []): ResponseInterface
    {
        return $this->client->getHttpClient()->get(
            $url,
            $headers
        );
    }

    protected function post(string $url, array $parameters = [], array $headers = []): ResponseInterface
    {
        return $this->client->getHttpClient()->post(
            $url,
            $parameters,
            $headers
        );
    }
}
