<?php

declare(strict_types=1);

namespace Mellow\Api\Webhook\Parameter;

class CreateParameters
{
    public function __construct(
        private array $parameters = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->parameters;
    }

    public function status(Status $status): static
    {
        $this->parameters['status'] = $status->value;

        return $this;
    }

    public function url(string $url): static
    {
        $this->parameters['url'] = $url;

        return $this;
    }
}
