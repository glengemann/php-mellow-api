<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancer;

use Mellow\Api\AbstractApi;
use Mellow\Api\Freelancer\Parameter\FreelancerListParameters;
use Mellow\Api\Freelancer\Parameter\InviteParameters;
use Mellow\Api\Freelancer\Response\FreelancerListResponse;
use Mellow\Api\Freelancer\Response\InviteResponse;

class Freelancer extends AbstractApi
{
    /**
     * @see https://my.mellow.io/api/docs/#inviting-freelancer
     */
    public function invite(InviteParameters $parameters)
    {
        $url = sprintf('customer/freelancers');

        $response = $this->post($url, $parameters->toArray());

        return $this->responseConverter->convert($response, InviteResponse::class);
    }

    /**
     * @see https://my.mellow.io/api/docs/#retrieving-freelancer-list
     */
    public function list(FreelancerListParameters $parameters)
    {
        $url = sprintf('customer/freelancers');

        if (0 !== count($parameters->toArray())) {
            $url .= '?' . http_build_query($parameters->toArray());
        }

        $response = $this->get($url);
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);

        return array_map(fn ($item) => new FreelancerListResponse(...$item), $response['items'] ?? []);
    }
}
