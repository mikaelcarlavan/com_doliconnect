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

/**
 * LogsList Model
 *
 * @since  0.0.1
 */
class DoliConnectModelLogs extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('t.*')->from($db->quoteName('#__doliconnect_log', 't'));

		return $query;
	}
}