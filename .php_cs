<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('somedir')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        // not sure what should be the equivalent
        //'empty_return' => false,
        'ordered_imports' => true,
        'return_type_declaration' => ['space_before' => 'one'],
    ])
    ->setFinder($finder)
;
