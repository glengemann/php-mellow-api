<?php

declare(strict_types=1);

namespace Mellow\Api\Login;

use Mellow\Api\AbstractApi;
use Mellow\Api\Login\Response\Credential;

class Login extends AbstractApi
{
    public function login(
        string $user,
        string $password,
        int $code = 0,
    ) {
        $url = 'customer/login';

        $response = $this->post($url, [
            'username' => $user,
            'password' => $password,
            'code' => $code,
        ]);

        return $this->responseConverter->convert($response, Credential::class);
    }

    public function refresh(string $refreshToken)
    {
        $url = 'customer/refresh';

        $response = $this->post($url, [
            'refreshToken' => $refreshToken,
        ]);

        return $this->responseConverter->convert($response, Credential::class);
    }
}
