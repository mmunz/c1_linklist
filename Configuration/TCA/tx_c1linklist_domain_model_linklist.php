<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:c1_linklist/Resources/Private/Language/locallang_db.xlf:tx_c1linklist_domain_model_linklist',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,url,image,description,categories,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('c1_linklist') . 'Resources/Public/Icons/tx_c1linklist_domain_model_linklist.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, url, image, categories',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, description;;;richtext:rte_transform[mode=ts_links], url, image, categories, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_c1linklist_domain_model_linklist',
				'foreign_table_where' => 'AND tx_c1linklist_domain_model_linklist.pid=###CURRENT_PID### AND tx_c1linklist_domain_model_linklist.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_linklist/Resources/Private/Language/locallang_db.xlf:tx_c1linklist_domain_model_linklist.title',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim'
			),
			
		),
        'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_linklist/Resources/Private/Language/locallang_db.xlf:tx_c1linklist_domain_model_linklist.description',
			'config' => array(
				'type' => 'text',
				'cols' => 60,
				'rows' => 5,
                ),
            'defaultExtras' => 'richtext[]:rte_transform[mode=ts_css]',
		),
		'url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_linklist/Resources/Private/Language/locallang_db.xlf:tx_c1linklist_domain_model_linklist.url',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim',
                'wizards' => array(
                    'link' => array(
                        'type' => 'popup',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
                        'icon' => 'link_popup.gif',
                        'module' => array(
                            'name' => 'wizard_element_browser',
                            'urlParameters' => array(
                                'mode' => 'wizard'
                            )
                        ),
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
                    )
                ),
                'softref' => 'typolink',
			),
			
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_linklist/Resources/Private/Language/locallang_db.xlf:tx_c1linklist_domain_model_linklist.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image', [
                        'foreign_types' => $GLOBALS['TCA']['tt_content']['columns']['image']['config']['foreign_types'],
                        'minitems' => 0,
                        'maxitems' => 1,
                    ],
                    'gif,jpg,jpeg,png,svg'
            ),
		),
	),
);