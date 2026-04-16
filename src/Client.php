<?php

declare(strict_types=1);

namespace Mellow;

use Http\Client\Common\HttpMethodsClientInterface;
use Mellow\Api\Freelancers\Freelancers;
use Mellow\HttpClient\Builder;
use Psr\Http\Client\ClientInterface;

class Client
{
    private Builder $httpClientBuilder;

    public function __construct(
        ?Builder $httpClientBuilder = null,
    ) {
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();
    }

    public static function createWithHttpClient(ClientInterface $httpClient): self
    {
        $builder = new Builder($httpClient);

        return new self($builder);
    }

    public function api(string $name)
    {
        return match ($name) {
            'freelancers' => new Freelancers($this),
            default => throw new \InvalidArgumentException("Invalid API name: $name"),
        };
    }

    public function authenticate(string $apiKey): void
    {
        $authentication = new \Authentication($apiKey);
        $this->httpClientBuilder->addPlugin($authentication);
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }
}
