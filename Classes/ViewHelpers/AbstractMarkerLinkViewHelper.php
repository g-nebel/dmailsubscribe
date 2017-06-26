<?php

namespace DPN\Dmailsubscribe\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Björn Fromme <fromme@dreipunktnull.come>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 ***************************************************************/

use TYPO3\CMS\Fluid\ViewHelpers\Link\PageViewHelper;

/**
 * Class AbstractMarkerLinkViewHelper
 *
 * Base class for marker bases links
 *
 * @package Dmailsubscribe
 */
abstract class AbstractMarkerLinkViewHelper extends PageViewHelper
{
    /**
     * @var string
     */
    protected $action;

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('pageUid', 'integer', 'Uid of the page containing the subscription plugin.', true);
    }

    /**
     * @return string
     */
    public function render()
    {
        $pageUid = (integer) $this->arguments['pageUid'];
        $additionalParams = array(
            'a' => $this->action,
            'c' => '###SYS_AUTHCODE###',
            'u' => '###USER_uid###',
        );
        return rawurldecode(parent::render($pageUid, $additionalParams, 0, true, true, '', false, true, false));
    }
}
