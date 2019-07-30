<?php

namespace Silvertip\A11y\Facades;

use Illuminate\Support\Facades\Facade;

class A11y extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'a11y';
    }
}
