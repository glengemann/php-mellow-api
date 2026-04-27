<?php

declare(strict_types=1);

namespace Mellow\Api\Company\Response;

final readonly class CompanyResponse
{
    public function __construct(
        public bool $activated,
        public int $id,
        public string $uuid,
        public string $companyName,
        public string $brandName,
        public bool $isDefault,
        public int $statusId,
        public string $country,
    ) {
    }
}
