<?php

namespace Marcorombach\LaravelAafRadius\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marcorombach\LaravelAafRadius\LaravelAafRadiusServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Marcorombach\\LaravelAafRadius\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelAafRadiusServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-aaf-radius_table.php.stub';
        $migration->up();
        */
    }
}
