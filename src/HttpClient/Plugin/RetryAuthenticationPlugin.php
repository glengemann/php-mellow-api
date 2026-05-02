<?php

declare(strict_types=1);

namespace Mellow\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Mellow\Store\TokenStoreInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RetryAuthenticationPlugin implements Plugin
{
    public function __construct(
        private readonly TokenStoreInterface $tokenStore,
        private readonly \Closure $tokenResolver,
    ) {
    }

    public function handleRequest(
        RequestInterface $request,
        callable $next,
        callable $first,
    ): Promise {
        return $next($request)->then(
            function (ResponseInterface $response) use ($request, $first): ResponseInterface {
                if (401 !== $response->getStatusCode()) {
                    return $response;
                }

                $this->tokenStore->delete();
                $token = ($this->tokenResolver)($request);
                $request = $request->withHeader('Authorization', 'Bearer ' . $token);

                return $first($request)->then(
                    function (ResponseInterface $response): ResponseInterface {
                        if (401 === $response->getStatusCode()) {
                            throw new \Exception('RetryAuthenticationPlugin: Failed to refresh token');
                        }

                        return $response;
                    }
                )->wait();
            }
        );
    }
}
