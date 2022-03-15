<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_doliconnect
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the DoliConnect Component
 *
 * @since  0.0.1
 */
class DoliConnectViewDefault extends JViewLegacy
{
	/**
	 * Display the DoliConnect view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
        $this->data = array();
        try {
            $this->data = DoliConnectHelper::updateMember(1, ['email' => 'test@test.com']);
            // $this->data = DoliConnectHelper::getMember(1);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

		// Display the view
		parent::display($tpl);
	}
}
