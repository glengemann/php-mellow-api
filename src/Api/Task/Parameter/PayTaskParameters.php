<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Parameter;

class PayTaskParameters
{
    public function __construct(
        private array $parameters = [],
    ) {
    }

    /**
     * @return array{
     *     taskId: int,
     *     uuid: string,
     * }
     */
    public function toArray(): array
    {
        return $this->parameters;
    }

    public function taskId(int $taskId): self
    {
        $this->parameters['taskId'] = $taskId;

        return $this;
    }

    public function uuid(string $uuid): self
    {
        $this->parameters['uuid'] = $uuid;

        return $this;
    }
}
