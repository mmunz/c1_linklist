<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "c1_linklist"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Link List',
	'description' => 'A simple linklist supporting title, description, url, image and category (using TYPO3 categories).',
	'category' => 'plugin',
	'author' => 'Manuel Munz',
	'author_email' => 't3dev@somakoma.de',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.0.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.0-7.6.99',
            'vhs' => '2.2.0-2.99.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
    'autoload' => [
        'psr-4' => [
            'C1\\C1LinkList\\' => 'Classes',
        ]
    ]
);