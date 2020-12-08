<?php

namespace MagicLaravel;

use MagicLaravel\Support\CamelCaseProxy;

class Magic extends \MagicAdmin\Magic
{
    public function token()
    {
        return new CamelCaseProxy($this->token);
    }

    public function user()
    {
        return new CamelCaseProxy($this->user);
    }
}
