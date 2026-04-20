<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Parameter;

class ServiceAttributesParameters
{
    public function __construct(
        private array $parameters = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->parameters;
    }

    public function id(int $id): self
    {
        $this->parameters['id'] = $id;

        return $this;
    }

    public function value(string $value): self
    {
        $this->parameters['value'] = $value;

        return $this;
    }
}
