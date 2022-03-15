<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_onapp
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_doliconnect'))
{
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}


// Get an instance of the controller prefixed by OnApp
$controller = JControllerLegacy::getInstance('DoliConnect');


// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
