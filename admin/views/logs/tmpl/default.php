<?php
/**
* @package     Joomla.Administrator
* @subpackage  com_onapp
*
* @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th width="1%"><?php echo JText::_('COM_DOLICONNECT_NUM'); ?></th>
        <th width="85%">
            <?php echo JText::_('COM_DOLICONNECT_LOG') ;?>
        </th>
        <th width="10%">
            <?php echo JText::_('COM_DOLICONNECT_DATE'); ?>
        </th>
        <th width="2%">
            <?php echo JText::_('COM_DOLICONNECT_ID'); ?>
        </th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="4">
            <?php echo $this->pagination->getListFooter(); ?>
        </td>
    </tr>
    </tfoot>
    <tbody>
    <?php if (!empty($this->items)) : ?>
        <?php foreach ($this->items as $i => $row) : ?>
            <tr>
                <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                <td>
                    <?php echo $row->log; ?>
                </td>
                <td align="center">
                    <?php echo JDate::getInstance($row->created_at)->format('d F Y H:i'); ?>
                </td>
                <td align="center">
                    <?php echo $row->id; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>