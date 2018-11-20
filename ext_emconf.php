<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'LMS3: Support',
    'description' => 'Contains number of different helpers that could be used in the other extensions',
    'category' => 'misc',
    'author' => 'Borulko Sergey',
    'author_email' => 'borulkosergey@icloud.com',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99',
            'routes' => '*'
        ]
    ]
];
