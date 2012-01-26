<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Administrator
 * @subpackage	com_installer
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

// no direct access
defined('_JEXEC') or die;

$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
?>
<form action="<?php echo JRoute::_('index.php?option=com_installer&view=manage');?>" method="post" name="adminForm" id="adminForm">
	<?php if ($this->showMessage) : ?>
		<?php echo $this->loadTemplate('message'); ?>
	<?php endif; ?>

	<?php if ($this->ftp) : ?>
		<?php echo $this->loadTemplate('ftp'); ?>
	<?php endif; ?>

	<?php echo $this->loadTemplate('filter'); ?>

	<?php if (count($this->items)) : ?>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>
				<th class="nowrap">
					<?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_NAME', 'name', $listDirn, $listOrder); ?>
				</th>
				<th>
					<?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_LOCATION', 'client_id', $listDirn, $listOrder); ?>
				</th>
				<th width="10%" class="center">
					<?php echo JHTML::_('grid.sort', 'JENABLED', 'enabled', $listDirn, $listOrder); ?>
				</th>
				<th>
					<?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_TYPE', 'type', $listDirn, $listOrder); ?>
				</th>
				<th width="10%" class="center">
					<?php echo JText::_('JVERSION'); ?>
				</th>
				<th width="10%">
					<?php echo JText::_('JDATE'); ?>
				</th>
				<th width="15%">
					<?php echo JText::_('JAUTHOR'); ?>
				</th>
				<th>
					<?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_FOLDER', 'folder', $listDirn, $listOrder); ?>
				</th>
				<th width="10">
					<?php echo JHTML::_('grid.sort', 'COM_INSTALLER_HEADING_ID', 'extension_id', $listDirn, $listOrder); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="11">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item): ?>
			<tr class="row<?php echo $i%2; if ($item->protected) echo ' protected';?>">
				<td>
					<?php echo JHtml::_('grid.id', $i, $item->extension_id); ?>
				</td>
				<td>
					<span class="bold hasTip" title="<?php echo htmlspecialchars($item->name.'::'.$item->description); ?>">
						<?php echo $item->name; ?></span>
				</td>
				<td class="center">
					<?php echo $item->client; ?>
				</td>
				<td class="center">
					<?php if (!$item->element) : ?>
					<strong>X</strong>
					<?php else : ?>
						<?php echo JHtml::_('jgrid.published', $item->enabled, $i, 'manage.');?>
					<?php endif; ?>
				</td>
				<td class="center">
					<?php echo JText::_('COM_INSTALLER_TYPE_' . $item->type); ?>
				</td>
				<td class="center">
					<?php echo @$item->version != '' ? $item->version : '&#160;'; ?>
				</td>
				<td class="center">
					<?php echo @$item->creationDate != '' ? $item->creationDate : '&#160;'; ?>
				</td>
				<td class="center">
					<span class="editlinktip hasTip" title="<?php echo addslashes(htmlspecialchars(JText::_('COM_INSTALLER_AUTHOR_INFORMATION').'::'.$item->author_info)); ?>">
						<?php echo @$item->author != '' ? $item->author : '&#160;'; ?></span>
				</td>
				<td class="center">
					<?php echo @$item->folder != '' ? $item->folder : JText::_('COM_INSTALLER_TYPE_NONAPPLICABLE'); ?>
				</td>
				<td>
					<?php echo $item->extension_id ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>
