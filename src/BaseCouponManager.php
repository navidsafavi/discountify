<?php

declare(strict_types=1);

namespace Safemood\Discountify;

use Safemood\Discountify\Enums\CouponType;

/**
 * Base Class CouponManager
 * Manages coupons for discounts.
 */
abstract class BaseCouponManager
{
    protected array $coupons = [];

    protected CouponType $couponType;
}
