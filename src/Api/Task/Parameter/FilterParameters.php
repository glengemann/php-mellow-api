<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Parameter;

use Mellow\Api\Currency;

class FilterParameters
{
    public function __construct(
        private array $parameters = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->parameters;
    }

    public function currency(Currency $currency): self
    {
        $this->parameters['currencyId'] = $currency->value;

        return $this;
    }

    public function sort(Sort $sort): self
    {
        $this->parameters['sort'] = $sort->value;

        return $this;
    }

    public function direction(string $direction): self
    {
        $this->parameters['direction'] = $direction;

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
