<?php

$header = <<<EOF
(c) Rob Bast <rob.bast@gmail.com>

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

return Symfony\CS\Config\Config::create()
    ->fixers(array(
        '-phpdoc_separation',
        '-phpdoc_params',
        '-return',
        'newline_after_open_tag',
        'header_comment',
        'ordered_use',
        'phpdoc_order',
        'strict',
        'strict_param',
    ))
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()->files()->name('*.php')->in(__DIR__)
    )
;
