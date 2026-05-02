<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Parameter;

class CreateParameters
{
    /**
     * @param array{
     *     uuid: string,
     *     categoryId: int,
     *     attributes: array{
     *         id: int,
     *         value: string
     *     },
     *     title: string,
     *     description: string,
     *     workerId: int,
     *     deadline: string,
     *     price: float
     * } $parameters
     */
    public function __construct(
        private array $parameters = [],
    ) {
    }

    /**
     * @return array{
     *     uuid: string,
     *     categoryId: int,
     *     attributes: array{
     *         id: int,
     *         value: string
     *     },
     *     title: string,
     *     description: string,
     *     workerId: int,
     *     deadline: string,
     *     price: float
     * }
     */
    public function toArray(): array
    {
        return $this->parameters;
    }

    public function uuid(string $uuid): static
    {
        $this->parameters['uuid'] = $uuid;

        return $this;
    }

    public function categoryId(int $categoryId): static
    {
        $this->parameters['categoryId'] = $categoryId;

        return $this;
    }

    /**
     * @param ServiceAttributesParameters[] $attributes
     */
    public function attributes(array $attributes): static
    {
        $this->parameters['attributes'] = $attributes;

        return $this;
    }

    public function attributeId(int $id): static
    {
        $this->parameters['attributes']['id'] = $id;

        return $this;
    }

    public function attributeValue(string $value): static
    {
        $this->parameters['attributes']['value'] = $value;

        return $this;
    }

    public function title(string $title): static
    {
        $this->parameters['title'] = $title;

        return $this;
    }

    public function description(string $description): static
    {
        $this->parameters['description'] = $description;

        return $this;
    }

    public function workerId(int $workerId): static
    {
        $this->parameters['workerId'] = $workerId;

        return $this;
    }

    public function deadline(\DateTimeInterface $deadline): static
    {
        $this->parameters['deadline'] = $deadline
            ->format(\DateTimeInterface::ATOM);

        return $this;
    }

    public function price(float $price): static
    {
        $this->parameters['price'] = $price;

        return $this;
    }
}
