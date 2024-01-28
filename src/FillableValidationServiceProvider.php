<?php

namespace Maize\FillableValidation;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Maize\FillableValidation\Commands\FillableValidationCommand;

class FillableValidationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-fillable-validation')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-fillable-validation_table')
            ->hasCommand(FillableValidationCommand::class);
    }
}
