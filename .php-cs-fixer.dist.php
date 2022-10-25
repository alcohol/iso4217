<?php

$header = <<<EOF
(c) Rob Bast <rob.bast@gmail.com>

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.
EOF;

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = new Finder();
$finder->in(__DIR__)->exclude(['cache', 'tools']);
$config = new Config('ISO4217', 'ISO4217 style guide');
$config
    ->setRules([
        // default
        '@PSR2' => true,
        '@Symfony' => true,
        // additionally
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
        'concat_space' => false,
        'header_comment' => ['header' => $header],
        'no_unused_imports' => false,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_imports' => true,
        'phpdoc_align' => false,
        'phpdoc_order' => true,
        'phpdoc_summary' => false,
        'simplified_null_return' => false,
        'ternary_to_null_coalescing' => true,
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
;

return $config;
