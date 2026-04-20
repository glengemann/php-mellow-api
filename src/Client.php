<?php

declare(strict_types=1);

namespace Mellow;

use Http\Client\Common\HttpMethodsClientInterface;
use Mellow\Api\Freelancer\Freelancer;
use Mellow\Api\Lookup\Lookup;
use Mellow\Api\Task\Task;
use Mellow\HttpClient\Builder;
use Mellow\HttpClient\Plugin\Authentication;
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
            'freelancers' => new Freelancer($this),
            'tasks' => new Task($this),
            default => throw new \InvalidArgumentException("Invalid API name: $name"),
        };
    }

    public function task(): Task
    {
        return new Task($this);
    }

    public function freelancer(): Freelancer
    {
        return new Freelancer($this);
    }

    public function lookup(): Lookup
    {
        return new Lookup($this);
    }

    public function authenticate(string $apiKey): void
    {
        $authentication = new Authentication($apiKey);
        $this->httpClientBuilder->addPlugin($authentication);
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }
}
