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
}
