<?php

namespace C1\C1Linklist\Controller;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Manuel Munz <t3dev@somakoma.de>, comuno.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * LinkListController
 */
class LinkListController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * linkListRepository
     *
     * @var \C1\C1Linklist\Domain\Repository\LinkListRepository
     * @inject
     */
    protected $linkListRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        $linkLists = $this->linkListRepository->findAll();
        $usedCategories = [];
        foreach ($linkLists as $key => $link) {
            $images = NULL;
            $images = $this->linkListRepository->getFileReferences($link->getUid());
            foreach ($link->getCategories() as $key => $category) {
                $usedCategories[$key] = $category;
            }
            foreach ($images as $image) {
                $imageProperties = $image->getProperties();
            }
            $link->setFiles($images);
        }
        $this->view->assign('linkLists', $linkLists);
        $this->view->assign('categories', $usedCategories);
    }

}
