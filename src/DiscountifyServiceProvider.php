<?php

declare(strict_types=1);

namespace Safemood\Discountify;

use Safemood\Discountify\Commands\ConditionMakeCommand;
use Safemood\Discountify\Contracts\CouponManagerInterface;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DiscountifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('discountify')
            ->hasConfigFile()
            ->hasCommand(ConditionMakeCommand::class);
    }

    public function packageRegistered(): void
    {

        $this->app->singleton(ConditionManager::class, function () {
            $conditionManager = new ConditionManager;

            $conditionManager->discover(
                config('discountify.condition_namespace'),
                config('discountify.condition_path')
            );

            return $conditionManager;
        });

        $this->app->singleton(CouponManagerInterface::class, function (\Illuminate\Foundation\Application $app) {
            $couponManager = $app->config->get('discountify.coupon_manager_class');

            return new $couponManager;
        });

        $this->app->singleton(Discountify::class, function (\Illuminate\Foundation\Application $app) {
            $couponManager = $app->config->get('discountify.coupon_manager_class');

            return new Discountify(
                $app->make(ConditionManager::class),
                $app->make($couponManager)
            );
        });
    }
}
