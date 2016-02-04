<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'C1.' . $_EXTKEY, 'Linklist', 'Link List'
);

// make categorizable
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'C1.' . $_EXTKEY, 'tx_c1linklist_domain_model_linklist', $fieldName = 'categories', $options = array()
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Link List');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_c1linklist_domain_model_linklist', 'EXT:c1_linklist/Resources/Private/Language/locallang_csh_tx_c1linklist_domain_model_linklist.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_c1linklist_domain_model_linklist');
