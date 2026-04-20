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

    protected function post(string $url, array $body = [], array $headers = []): ResponseInterface
    {
        $body = $this->createJsonBody($body);

        return $this->client->getHttpClient()->post(
            $url,
            $headers,
            $body,
        );
    }

    protected function delete(string $url, array $parameters = [], array $headers = []): ResponseInterface
    {
        $body = $this->createJsonBody($parameters);

        return $this->client->getHttpClient()->delete(
            $url,
            $headers,
            $body,
        );
    }

    protected function createJsonBody(array $parameters): ?string
    {
        return (0 === count($parameters)) ? null : json_encode($parameters, empty($parameters) ? JSON_FORCE_OBJECT : 0);
    }
}
