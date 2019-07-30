<?php

namespace Silvertip\A11y;

use PHPUnit\Framework\Assert as PHPUnit;

class BrowserMixins
{

    public function assertHasNoA11yViolations()
    {
        return function ($context = null) {
            $constraint = new PassesA11yChecks($this);
            PHPUnit::assertThat($context, $constraint);
            return $this;
        };
    }
}
