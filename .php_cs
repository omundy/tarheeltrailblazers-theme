<?php

return PhpCsFixer\Config::create()
    ->setRules([
        'indentation_type' => true
    ])
    ->setIndent("\t")
    ->setFinder(
        PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->in(__DIR__)
    )
;
