<?php

declare(strict_types=1);

namespace Mellow\Api;

enum TaskStatus: int
{
    /** 17 - Initiated by Customer */
    case DRAFT = 17;
    /** 1 - Initiated by Customer */
    case UNCONFIRMED = 1;
    /** 2 - Initiated by Freelancer */
    case IN_PROGRESS = 2;
    /** 3 - Initiated by Freelancer */
    case PENDING_REVIEW = 3;
    /** 4 - Initiated by Customer */
    case PENDING_PAYMENT = 4;
    /** 5 - Initiated by Customer */
    case COMPLETED = 5;
    /** 6 - Initiated by Freelancer */
    case REJECTED_BY_FREELANCER = 6;
    /** 8 - Initiated by Customer */
    case REJECTED_BY_CUSTOMER = 8;
    /** 11 - Initiated by Customer */
    case CANCELLED_BY_CUSTOMER = 11;
    /** 12 - Initiated by Customer */
    case QUEUE_FOR_PAYMENT = 12;
    /* 13 - Initiated by Freelancer */
    case CANCELLED_BY_FREELANCER = 13;
    /* 14 - Automatically generated */
    case CUSTOMER_REVIEW_REQUIRED = 14;
    /* 16 - Initiated by Customer */
    case PAYMENT_FAILED = 16;
}
