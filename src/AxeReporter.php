<?php

namespace Silvertip\A11y;

use Illuminate\Support\Arr;

class AxeReporter
{

    public static function report($results)
    {
        $lines = array_map(function ($violation) {
            return $violation['id'] . ': ' . $violation['help'] . "\n" .
                implode(
                    "\n",
                    array_map(function ($node) {
                        return "  " . implode(', ', Arr::flatten($node['target'])) . "\n" .
                        implode(
                            "\n",
                            array_map(function ($check) use ($node) {
                                return "    " . $check['message'] . ' (' . $node['impact'] . ')';
                            }, $node['any'])
                        );
                    }, $violation['nodes'])
                );
        }, $results['violations'] ?? []);

        return implode("\n", $lines);
    }
}
