<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancers;

use Mellow\Api\AbstractApi;
use Mellow\Api\Freelancers\Parameter\InviteParameters;

class Freelancers extends AbstractApi
{
    /**
     * @see https://my.mellow.io/api/docs/#inviting-freelancer
     */
    public function invite(InviteParameters $parameters)
    {
        $url = sprintf('customer/freelancers');

        $response = $this->post($url, $parameters->toArray());

        return $this->responseConverter->convert($response, \InviteResponse::class);
    }
}
