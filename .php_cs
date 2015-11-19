<?php

$header = <<<EOF
(c) Rob Bast <rob.bast@gmail.com>

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.
EOF;

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->files()
    ->name('*.php')
    ->exclude('vendor')
    ->in(__DIR__)
;

/* Based on dev-master|^2.0 of php-cs-fixer */
return Symfony\CS\Config\Config::create('ISO4217', 'ISO4217 style guide')
    ->setUsingCache(false)
    ->setUsingLinter(true)
    ->setRiskyAllowed(true)
    ->setRules([
        // default
        '@PSR2' => true,
        // additionally
        'blankline_after_open_tag' => true,
        'concat_without_spaces' => true,
        'extra_empty_lines' => true,
        'function_typehint_space' => true,
        'header_comment' => ['header' => $header],
        'include' => true,
        'method_separation' => true,
        'multiline_array_trailing_comma' => true,
        'new_with_braces' => true,
        'newline_after_open_tag' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_empty_lines_after_phpdocs' => true,
        'operators_spaces' => true,
        'ordered_use' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_no_package' => true,
        'phpdoc_order' => true,
        'phpdoc_scalar' => true,
        'phpdoc_separation' => true,
        'phpdoc_summary' => true,
        'phpdoc_to_comment' => true,
        'phpdoc_trim' => true,
        'remove_leading_slash_use' => true,
        'remove_lines_between_uses' => true,
        'return' => true,
        'short_array_syntax' => true,
        'single_array_no_trailing_comma' => true,
        'single_blank_line_before_namespace' => true,
        'single_quote' => true,
        'spaces_cast' => true,
        'strict' => true,
        'ternary_spaces' => true,
        'trim_array_spaces' => true,
        'unalign_double_arrow' => true,
        'unalign_equals' => true,
        'whitespacy_lines' => true,
    ])
    ->finder($finder)
;
