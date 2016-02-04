<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'C1.' . $_EXTKEY,
	'Linklist',
	array(
		'LinkList' => 'list',
		
	),
	// non-cacheable actions
	array(
		'LinkList' => '',
		
	)
);
