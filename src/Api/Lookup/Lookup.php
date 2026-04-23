<?php

declare(strict_types=1);

namespace Mellow\Api\Lookup;

use Mellow\Api\AbstractApi;
use Mellow\Api\Lookup\Response\ServiceAttributeResponse;
use Mellow\Api\Lookup\Response\ServiceResponse;

class Lookup extends AbstractApi
{
    /** @return ServiceResponse[] */
    public function services(): array
    {
        $url = 'customer/lookups/services';

        $response = $this->get($url);

        return $this->responseConverter->convert($response, ServiceResponse::class . '[]');
    }

    public function serviceAttributes(): array
    {
        $url = 'customer/lookups/service-attributes';

        $response = $this->get($url);

        return $this->responseConverter->convert($response, ServiceAttributeResponse::class . '[]');
    }
}
