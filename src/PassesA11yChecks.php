<?php

namespace Silvertip\A11y;

use Illuminate\Support\Arr;
use PHPUnit\Framework\Constraint\Constraint;

class PassesA11yChecks extends Constraint {

    protected $browser;

    public function __construct($browser) {
        $this->browser = $browser;
    }

    public function matches($context): bool {
        $runner = $this->getRunner();
        $runner->setContext($context);

        $runner->analyze();
        return !$runner->hasViolations();
    }

    public function toString(): string {
        return 'passes a11y checks';
    }

    public function failureDescription($actual): string {
        return 'context \'' . ($actual ? $actual : 'document') . '\' has no a11y violations';
    }

    protected function additionalFailureDescription($actual): string {
        return AxeReporter::report($this->getRunner()->getResults());
    }

    protected function getRunner() {
        if (!isset($this->browser->axeRunner)) {
            $this->browser->axeRunner = new AxeRunner($this->browser->driver);
        }

        return $this->browser->axeRunner;
    }
}
