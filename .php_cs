<?php

$header = <<<EOF
(c) Rob Bast <rob.bast@gmail.com>

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

return Symfony\CS\Config\Config::create()
    ->fixers(array(
        '-concat_without_spaces',
        '-phpdoc_params',
        '-phpdoc_separation',
        '-phpdoc_to_comment',
        '-phpdoc_var_without_name',
        '-return',
        'concat_with_spaces',
        'newline_after_open_tag',
        'header_comment',
        'ordered_use',
        'phpdoc_order',
        'strict',
        'strict_param',
    ))
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->files()
            ->name('*.php')
            ->in(__DIR__)
    )
;
