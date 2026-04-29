<?php

declare(strict_types=1);

namespace Mellow\Api\Company;

use Mellow\Api\AbstractApi;
use Mellow\Api\Company\Response\CompanyResponse;

class Company extends AbstractApi
{
    public function list()
    {
        $response = $this->get('customer/companies');

        return $this->responseConverter->convert($response, CompanyResponse::class . '[]');
    }
}
