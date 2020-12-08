<?php

namespace MagicLaravel;

/**
 * @method static MagicAdmin\Resource\User user()
 * @method static MagicAdmin\Resource\Token token()
 *
 * @see \MagicLaravel\Magic
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return Magic::class;
    }
}
