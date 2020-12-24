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
    const HTTP_RETRIES = 123;
    const HTTP_TIMEOUT = 456;
    const HTTP_BACKOFF_FACTOR = 789;

    public function testMagic()
    {
        $magic = app(Magic::class);

        static::assertInstanceOf(Magic::class, $magic);
        static::assertSame(static::SECRET_API_KEY, $magic->api_secret_key);
        static::assertSame($magic->user->request_client->_retries, static::HTTP_RETRIES);
        static::assertSame($magic->user->request_client->_timeout, static::HTTP_TIMEOUT);
        static::assertSame($magic->user->request_client->_backoff_factor, static::HTTP_BACKOFF_FACTOR);
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
        $app['config']->set('magic.http.retries', static::HTTP_RETRIES);
        $app['config']->set('magic.http.timeout', static::HTTP_TIMEOUT);
        $app['config']->set('magic.http.backoff_factor', static::HTTP_BACKOFF_FACTOR);
    }
}
