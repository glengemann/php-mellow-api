<?php

declare(strict_types=1);

namespace Mellow\Api\Task;

use Mellow\Api\AbstractApi;
use Mellow\Api\Task\Parameter\CreateParameters;
use Mellow\Api\Task\Parameter\FilterParameters;
use Mellow\Api\Task\Response\TaskResponse;

class Task extends AbstractApi
{
    /**
     * @see https://my.mellow.io/api/docs/#retrieving-task-list
     */
    public function list(FilterParameters $parameters)
    {
        $url = sprintf('customer/tasks');

        if (0 !== count($parameters->toArray())) {
            $url .= '?' . http_build_query($parameters->toArray());
        }

        $response = $this->get($url);

        return $this->responseConverter->convert($response, TaskResponse::class . '[]');
    }

    /**
     * @see https://my.mellow.io/api/docs/#creating-a-task
     */
    public function create(CreateParameters $parameters)
    {
        $url = 'customer/tasks';
    }
}
