<?php

declare(strict_types=1);

namespace Safemood\Discountify\Enums;

enum CouponType: string
{
    case FIXED_PRICE = 'fixed-price';

    case PERCENT = 'percent';
}
