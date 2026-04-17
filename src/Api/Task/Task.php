<?php

declare(strict_types=1);

namespace Mellow\Api\Task;

use Mellow\Api\AbstractApi;

class Task extends AbstractApi
{
    // curl -X GET "https://my.mellow.io/api/customer/tasks?filter[creatorId]=123"
    public function list()
    {
        $url = sprintf('customer/tasks');

        $response = $this->get($url);

        return $this->responseConverter->convert($response, TaskCollection::class);
    }

    // curl -X GET "https://my.mellow.io/api/customer/tasks/c6e8e285-1e0a-4a11-a676-89211c0adccc"
    public function get(string $id)
    {
        $url = sprintf('customer/tasks/%s', $id);
    }

    // curl -X POST "https://my.mellow.io/api/customer/tasks"
    public function create()
    {
        $url = 'customer/tasks';
    }
}
