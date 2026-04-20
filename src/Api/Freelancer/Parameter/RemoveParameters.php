<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancer\Parameter;

class RemoveParameters
{
    /**
     * @param array{
     *     freelancerId: int,
     *     freelancerUuid: string,
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

    public function freelancerId(int $freelancerId): self
    {
        $this->parameters['freelancerId'] = $freelancerId;

        return $this;
    }

    public function freelancerUuid(string $freelancerUuid): self
    {
        $this->parameters['freelancerUuid'] = $freelancerUuid;

        return $this;
    }
}
