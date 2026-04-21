<?php

namespace Mellow\Api\Webhook\Parameter;

enum Status: string
{
    case ENABLED = 'enabled';
    case DISABLED = 'disabled';
}
