<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancer\Parameter;

class FreelancerListParameters
{
    /**
     * @param array{
     *     page?: int,
     *     size?: int,
     * } $parameters
     */
    public function __construct(
        private array $parameters = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->parameters;
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
