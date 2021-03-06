<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->name('php-cs-fixer-consistency-check')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'simplified_null_return' => false,
        'ordered_imports' => true,
        'return_type_declaration' => ['space_before' => 'one'],
    ])
    ->setFinder($finder)
;
