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

    const DID_TOKEN = 'WyIweGUwMjQzNTVlNDI5ZGNhZDM1MTdhZDk5ZWEzNDEwYWJmZDQ1YjBiNjM5OGIwNjY1NGRiYTQxNzljODdlMTYyNzgxNTc1YjA5ODFjNjU4ZjcwMjYwZTQ5MjMwZGE5NDg4YTA0ZDk5NzBlYjM4ZTZmZGRlY2Q2NTA5YTAyN2IwOGI5MWIiLCJ7XCJpYXRcIjoxNTg1MDExMjA0LFwiZXh0XCI6MTkwMDQxMTIwNCxcImlzc1wiOlwiZGlkOmV0aHI6MHhCMmVjOWI2MTY5OTc2MjQ5MWI2NTQyMjc4RTlkRkVDOTA1MGY4MDg5XCIsXCJzdWJcIjpcIjZ0RlhUZlJ4eWt3TUtPT2pTTWJkUHJFTXJwVWwzbTNqOERReWNGcU8ydHc9XCIsXCJhdWRcIjpcImRpZDptYWdpYzpmNTQxNjhlOS05Y2U5LTQ3ZjItODFjOC03Y2IyYTk2YjI2YmFcIixcIm5iZlwiOjE1ODUwMTEyMDQsXCJ0aWRcIjpcIjJkZGY1OTgzLTk4M2ItNDg3ZC1iNDY0LWJjNWUyODNhMDNjNVwiLFwiYWRkXCI6XCIweDkxZmJlNzRiZTZjNmJmZDhkZGRkZDkzMDExYjA1OWI5MjUzZjEwNzg1NjQ5NzM4YmEyMTdlNTFlMGUzZGYxMzgxZDIwZjUyMWEzNjQxZjIzZWI5OWNjYjM0ZTNiYzVkOTYzMzJmZGViYzhlZmE1MGNkYjQxNWU0NTUwMDk1MmNkMWNcIn0iXQ==';

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
