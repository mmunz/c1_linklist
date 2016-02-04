# About c1_linklist

This extension for TYPO3 7.6 adds a frontend plugin to show a link list.
Each link is stored as a database record and can have:

* title
* description
* url
* image
* categories (using TYPO3 categories)

The page is rendered using fluid templates. All links from all categories are
shown by default and can be filtered using javascript.

## Installation

* Install the extension and include the static typoscript.
* create a sysfolder to store the link records
* use the PID of this sysfolder as plugin.tx_linklist_linklist.view.persistence.storagePid
	
## System Requirements

* TYPO3 > 7.6.0
* vhs
