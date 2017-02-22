<?php
/**
 * Multidatabases Create content button Element View
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php if (Current::permission('content_creatable')) : ?>
	<div class="pull-right">
		<?php echo $this->Button->addLink(
			'',
			[
				'controller' => 'multidatabase_add',
				'action' => 'add',
				'frame_id' => Current::read('Frame.id'),
				'block_id' => Current::read('Block.id'),
			],
			[
				'tooltip' => __d('multidatabases', 'Create content')
			]
		); ?>
	</div>
<?php endif;
