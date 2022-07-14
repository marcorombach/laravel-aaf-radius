<?php

namespace Marcorombach\LaravelAafRadius;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Marcorombach\LaravelAafRadius\Commands\LaravelAafRadiusCommand;

class LaravelAafRadiusServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-aaf-radius')
            ->hasRoute('web')
            ->hasConfigFile();
    }
}
