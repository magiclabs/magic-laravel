<?php

namespace MagicAdmin\Tests;

use MagicAdmin\Resource\Token;
use MagicAdmin\Resource\User;
use MagicLaravel\Facade;
use MagicLaravel\Magic;
use MagicLaravel\ServiceProvider;
use Orchestra\Testbench\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class MagicTest extends TestCase
{
    const SECRET_API_KEY = 'a-fake-key';

    public function testMagic()
    {
        $magic = app(Magic::class);

        static::assertInstanceOf(Magic::class, $magic);
        static::assertSame(static::SECRET_API_KEY, $magic->api_secret_key);
    }

    public function testFacade()
    {
        static::assertInstanceOf(Token::class, Facade::token());
        static::assertInstanceOf(User::class, Facade::user());
    }

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('magic.secret_api_key', static::SECRET_API_KEY);
    }
}
