<?php

declare(strict_types=1);

namespace Mellow\Api\Task\Parameter;

enum Sort: string
{
    case DATE_END = 'date_end';
    case DATE_FINISHED = 'date_finished';
    case PRICE = 'price';
}
