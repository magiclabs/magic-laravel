<?php

namespace MagicLaravel\Support;

use BadMethodCallException;
use Illuminate\Support\Str;

/**
 * This class is a wrapper for classes that define their methods using snake
 * case so that those methods can alternatively be called using camel case.
 */
class CamelCaseProxy
{
    public $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function __call($method, $args)
    {
        if (\method_exists($this->instance, Str::snake($method))) {
            return $this->instance->{Str::snake($method)}(...$args);
        }
        if (\method_exists($this->instance, $method)) {
            return $this->instance->{$method}(...$args);
        }

        throw new BadMethodCallException("Method '{$method}' does not exist");
    }

    public function __get($key)
    {
        return $this->instance->{$key};
    }
}
