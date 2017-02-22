<?php
/**
 * multidatabase content list view template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
echo $this->NetCommonsHtml->script(array(
	'/authorization_keys/js/authorization_keys.js',
));
?>
<article class="block-setting-body">
	<?php echo $this->BlockTabs->main(BlockTabsHelper::MAIN_TAB_BLOCK_INDEX); ?>

	<?php echo $this->BlockIndex->description(); ?>

	<div class="tab-content">
		<?php echo $this->BlockIndex->create(); ?>

		<?php echo $this->BlockIndex->addLink('',
			array(
				'controller' => 'multidatabase_add',
				'action' => 'add',
				'frame_id' => Current::read('Frame.id'),
				'block_id' => Current::read('Block.id'),
				'q_mode' => 'setting'
			)); ?>

		<div id="nc-multidatabase-setting-<?php echo Current::read('Frame.id'); ?>">
			<?php echo $this->BlockIndex->startTable(); ?>
			<thead>
			<tr>
				<?php echo $this->BlockIndex->tableHeader(
					'Frame.block_id'
				); ?>

				<?php echo $this->BlockIndex->tableHeader(
					'Multidatabase.status', __d('multidatabases', 'Status'),
					array('sort' => true, 'type' => false)
				); ?>
				<?php echo $this->BlockIndex->tableHeader(
					'Multidatabase.title', __d('multidatabases', 'Title'),
					array('sort' => true, 'editUrl' => true)
				); ?>
				<?php echo $this->BlockIndex->tableHeader(
					'Multidatabase.modified', __d('net_commons', 'Updated date'),
					array('sort' => true, 'type' => 'datetime')
				); ?>
				<?php echo $this->BlockIndex->tableHeader(
					'', __d('multidatabases', 'Answer CSV'),
					array('type' => 'center')
				); ?>
				<?php echo $this->BlockIndex->tableHeader(
					'', __d('multidatabases', 'Answer List'),
					array('type' => 'center')
				); ?>
			</tr>
			</thead>
			<tbody>
			<?php foreach ((array)$multidatabases as $multidatabase) : ?>
				<?php echo $this->BlockIndex->startTableRow($multidatabase['Block']['id']); ?>
				<?php echo $this->BlockIndex->tableData(
					'Frame.block_id', $multidatabase['Block']['id']
				); ?>
				<?php echo $this->BlockIndex->tableData(
					'',
					$this->MultidatabaseStatusLabel->statusLabelManagementWidget($multidatabase),
					array('escape' => false)
				); ?>
				<?php echo $this->BlockIndex->tableData(
					'',
					$this->TitleIcon->titleIcon($multidatabase['Multidatabase']['title_icon']) . h($multidatabase['Multidatabase']['title']),
					array(
						'escape' => false,
						'editUrl' => array(
							'plugin' => 'multidatabases',
							'controller' => 'multidatabase_edit',
							'action' => 'edit_question',
							'block_id' => $multidatabase['Multidatabase']['block_id'],
							//Current::read('Block.id'),
							$multidatabase['Multidatabase']['key'],
							'frame_id' => Current::read('Frame.id'),
							'q_mode' => 'setting'
						)
					)); ?>
				<?php echo $this->BlockIndex->tableData(
					'',
					$multidatabase['Multidatabase']['modified'],
					array('type' => 'datetime')
				); ?>
				<?php if ($multidatabase['Multidatabase']['all_answer_count'] > 0): ?>
					<?php echo $this->BlockIndex->tableData(
						'',
						$this->AuthKeyPopupButton->popupButton(
							array(
								'url' => NetCommonsUrl::actionUrl(array(
									'plugin' => 'multidatabases',
									'controller' => 'multidatabase_blocks',
									'action' => 'download',
									'block_id' => $multidatabase['Multidatabase']['block_id'],
									$multidatabase['Multidatabase']['key'],
									'frame_id' => Current::read('Frame.id'))),
								'popup-title' => __d('authorization_keys', 'Compression password'),
								'popup-label' => __d('authorization_keys', 'Compression password'),
								'popup-placeholder' => __d('authorization_keys', 'please input compression password'),
							)
						),
						array('escape' => false, 'type' => 'center')
					); ?>
					<?php echo $this->BlockIndex->tableData(
						'',
						$this->NetCommonsHtml->link(__d('multidatabases', 'Answer List'),
							[
								'action' => 'answer_list',
								$multidatabase['Multidatabase']['key']
							],
							[
								'class' => 'btn btn-default'
							]),
						array('escape' => false, 'type' => 'center')
					); ?>
				<?php else: ?>
					<td></td>
					<td></td>
				<?php endif; ?>
				<?php echo $this->BlockIndex->endTableRow(); ?>
			<?php endforeach; ?>
			</tbody>
			<?php echo $this->BlockIndex->endTable(); ?>
			<?php echo $this->BlockIndex->end(); ?>

			<?php echo $this->element('NetCommons.paginator'); ?>
		</div>
	</div>
</article>
