<?php

namespace Silvertip\A11y;

use Illuminate\Support\Traits\Tappable;
use Laravel\Dusk\Browser;

class AxeRunner {
    use Tappable;

    protected $driver;
    protected $context;
    protected $options;
    protected $results;
    protected $didInject;

    protected static $defaultContext = null;

    protected static $defaultOptions = [
        'resultTypes' => [ 'violations', 'incomplete' ],
        'absolutePaths' => true
    ];

    protected static $runnerSnippet = "
        var context = arguments[0] || document;
        var options = arguments[1];
        var callback = arguments[2];

        window.axe.run(document, options).then(callback);
    ";

    public function __construct($driver, $context = null, $options = []) {
        $this->driver = $driver;
        $this->didInject = false;

        $this->setContext(static::$defaultContext);
        $this->options = array_merge(static::$defaultOptions, $options);
    }

    public function setContext($context) {
        if ($this->context != $context) {
            $this->results = [];
        }
        $this->context = $context;
    }

    public function analyze($inject = true) {
        if ($inject) {
            $this->injectAxe();
        }
        $this->results = $this->runAxe();
        return $this;
    }

    public function hasViolations() {
        return count($this->results['violations']) > 0;
    }

    public function getResults() {
        return $this->results;
    }

    protected function injectAxe() {
        $this->driver
            ->executeScript(
                file_get_contents(
                    base_path('node_modules/axe-core/axe.min.js')
                )
            );
        $this->didInject = true;
    }

    protected function runAxe() {
        return $this->driver
            ->executeAsyncScript(static::$runnerSnippet, [$this->context, $this->options]);
    }
}
