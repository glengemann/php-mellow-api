<?php

declare(strict_types=1);

namespace Mellow\Api\Lookup;

use Mellow\Api\AbstractApi;
use Mellow\Api\Lookup\Response\ServiceAttributeResponse;
use Mellow\Api\Lookup\Response\ServiceResponse;

class Lookup extends AbstractApi
{
    public function services(): array
    {
        $url = 'customer/lookup/services';

        $response = $this->get($url);

        return $this->responseConverter->convert($response, ServiceResponse::class . '[]');
    }

    public function serviceAttributes(): array
    {
        $url = 'customer/lookup/service-attributes';

        $response = $this->get($url);

        return $this->responseConverter->convert($response, ServiceAttributeResponse::class . '[]');
    }
}
