<?php

declare(strict_types=1);

namespace Mellow\Api\Lookup\Response;

class ServiceResponse
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $titleEn,
        public readonly string $titleDoc,
        public readonly string $titleDocEn,
    ) {
    }
}
