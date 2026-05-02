<?php

declare(strict_types=1);

namespace Mellow\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class CompanyPlugin implements Plugin
{
    public function __construct(
        private readonly int $companyId,
    ) {
    }

    public function handleRequest(
        RequestInterface $request,
        callable $next,
        callable $first,
    ): Promise {
        $request = $request->withHeader('x-company-id', $this->companyId);

        return $next($request);
    }
}
