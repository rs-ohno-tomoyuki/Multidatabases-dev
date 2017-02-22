<?php
/**
 * multidatabase create view template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Allcreator <info@allcreator.net>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->element('Multidatabases.scripts');
echo $this->NetCommonsHtml->script(array(
	'/multidatabases/js/multidatabases_metadata_edit.js'
));
$jsPastMultidatabases = NetCommonsAppController::camelizeKeyRecursive($pastMultidatabases);
?>
<?php if (Current::permission('block_editable') && $this->layout === 'NetCommons.setting') : ?>
	<?php echo $this->BlockTabs->main(BlockTabsHelper::MAIN_TAB_BLOCK_INDEX); ?>
	<?php echo $this->BlockTabs->block(BlockTabsHelper::BLOCK_TAB_SETTING, ['displayAllTab' =>
		true, 'displayBlockTitle' => true]); ?>
<?php endif ?>


<div ng-controller="Multidatabases.add"
	 ng-init="initialize(<?php echo h(json_encode($jsPastMultidatabases)); ?>,
						'<?php echo h($this->data['ActionMultidatabaseAdd']['create_option']); ?>')">
	<div class="row">

		<div class="col-xs-12">
			<p>
				<?php echo __d('multidatabases', 'You can create a new multidatabase. Please choose how to create.'); ?>
			</p>
		</div>

		<?php /* ファイル送信は、FormHelperでform作成時、'type' => 'file' 必要。記述すると enctype="multipart/form-data" が追加される */ ?>
		<?php echo $this->NetCommonsForm->create('ActionMultidatabaseAdd', array(
			'type' => 'file',
		)); ?>
		<?php echo $this->NetCommonsForm->hidden('Frame.id'); ?>
		<?php echo $this->NetCommonsForm->hidden('Block.id'); ?>

		<?php echo $this->NetCommonsForm->error('create_option', null, array('class' => 'help-block')); ?>

		<div class="form-group col-xs-12">
			<?php echo $this->element('Multidatabases.MultidatabaseAdd/create_new'); ?>
		</div>

		<div class="form-group col-xs-12">
			<?php echo $this->element('Multidatabases.MultidatabaseAdd/create_reuse'); ?>
		</div>

		<div class="text-center">
			<?php echo $this->BackTo->linkButton(__d('net_commons', 'Cancel'), $cancelUrl);
			?>
			<?php echo $this->Button->save(__d('net_commons', 'NEXT'), array('icon' => 'chevron-right')) ?>
		</div>

		<?php echo $this->NetCommonsForm->end(); ?>
	</div>
</div>
