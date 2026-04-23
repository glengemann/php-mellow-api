<?php

declare(strict_types=1);

namespace Mellow\Api;

enum Currency: int
{
    case RUB = 1;
    case USD = 2;
    case EUR = 3;
}
