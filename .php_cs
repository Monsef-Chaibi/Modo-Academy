<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ]);

return PhpCsFixer\Config::create()
    ->setRules([
        'indentation_type' => 'spaces',
        'indentation_size' => 4,
        'array_syntax' => ['syntax' => 'short'],
        'phpdoc_summary' => false,
        'phpdoc_no_empty_return' => false,
        // Add more rules here as needed
    ])
    ->setFinder($finder);
