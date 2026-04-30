<?php

declare(strict_types=1);

namespace Mellow\Api\Lookup\Parameter;

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

    public function page(int $page = 1): self
    {
        $this->parameters['page'] = $page;

        return $this;
    }

    public function size(int $size = 20): self
    {
        $this->parameters['size'] = $size;

        return $this;
    }
}
