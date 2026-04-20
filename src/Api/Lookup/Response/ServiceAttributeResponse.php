<?php

declare(strict_types=1);

namespace Mellow\Api\Lookup\Response;

class ServiceAttributeResponse
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $titleEn,
        public readonly string $description,
        public readonly string $descriptionEn,
        public readonly string $type,
        public readonly int $attrTypeId,
    ) {
    }
}
