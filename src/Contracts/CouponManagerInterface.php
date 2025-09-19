<?php

declare(strict_types=1);

namespace Safemood\Discountify\Contracts;

use Safemood\Discountify\Enums\CouponType;

interface CouponManagerInterface
{
    public function add(array $coupon): self;

    public function remove(string $code): self;

    public function apply(string $code, int|string|null $userId = null): bool;

    public function get(string $code): ?array;

    public function couponDiscount(): float;

    public function couponPriceDiscount(): float;

    public function removeAppliedCoupons(): self;

    public function clearAppliedCoupons(): self;

    public function appliedCoupons(): array;

    public function clear(): self;

    public function getCouponType(): CouponType;
}
