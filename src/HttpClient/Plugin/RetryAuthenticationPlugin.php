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
    private bool $refreshInProgress = false;

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
            function (ResponseInterface $response) use ($request, $next): ResponseInterface {
                if (401 !== $response->getStatusCode()) {
                    return $response;
                }

                if (true === $this->refreshInProgress) {
                    return $response;
                }

                $this->refreshInProgress = true;

                $this->tokenStore->delete();
                try {
                    $token = ($this->tokenResolver)($request);
                    $request = $request->withHeader('Authorization', 'Bearer ' . $token);

                    return $next($request)->then(
                        function (ResponseInterface $response): ResponseInterface {
                            if (401 === $response->getStatusCode()) {
                                throw new \Exception('RetryAuthenticationPlugin: Failed to refresh token');
                            }

                            return $response;
                        }
                    )->wait();
                } finally {
                    $this->refreshInProgress = false;
                }
            }
        );
    }
}
