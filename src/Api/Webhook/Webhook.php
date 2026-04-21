<?php

declare(strict_types=1);

namespace Mellow\Api\Webhook;

use Mellow\Api\AbstractApi;
use Mellow\Api\Webhook\Parameter\CreateParameters;
use Mellow\Api\Webhook\Response\WebhookResponse;

class Webhook extends AbstractApi
{
    /**
     * @see https://my.mellow.io/api/docs/#retrieve-webhook
     */
    public function retrive()
    {
        $url = 'customer/web-hook';

        $response = $this->get($url);

        return $this->responseConverter->convert($response, WebhookResponse::class);
    }

    /**
     * @see https://my.mellow.io/api/docs/#create-or-update-webhook
     */
    public function create(CreateParameters $parameters)
    {
        $url = 'customer/web-hook';

        $response = $this->post($url, $parameters->toArray());

        return $this->responseConverter->convert($response, \stdClass::class);
    }

    /**
     * @see https://my.mellow.io/api/docs/#delete-webhook
     */
    public function remove(array $parameters)
    {
        $url = 'customer/web-hook';

        $response = $this->delete($url, $parameters);

        return $this->responseConverter->convert($response, \stdClass::class);
    }
}
