<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_doliconnect
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JLoader::register('DoliConnectHelper', JPATH_COMPONENT . '/helpers/doliconnect.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('DoliConnect');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
