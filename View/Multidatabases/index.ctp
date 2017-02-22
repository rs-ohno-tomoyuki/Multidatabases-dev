<?php
/**
 * registration page setting view template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Allcreator <info@allcreator.net>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->element('Multidatabases.scripts');
?>

<article id="nc-multidatabases-<?php echo Current::read('Frame.id'); ?>" ng-controller="Multidatabases">

	<?php echo $this->element('Multidatabases.Multidatabases/add_button'); ?>

	<div class="clearfix"></div>

	<table class="table nc-content-list">
		<?php foreach($contents as $content): ?>
			<tr><td>
					<div class="row">
						<div class="col-md-8 col-xs-12">

							<?php echo $this->MultidatabaseStatusLabel->statusLabel($content);?>

							<?php if ($content['Multidatabase']['answer_timing'] == MultidatabasesComponent::USES_USE): ?>
								<strong>
									<?php echo $this->Date->dateFormat($content['Multidatabase']['answer_start_period']); ?>
									<?php echo __d('Multidatabases', ' - '); ?>
									<?php echo $this->Date->dateFormat($content['Multidatabase']['answer_end_period']); ?>
								</strong>
							<?php endif ?>

							<h2>
								<?php echo $this->TitleIcon->titleIcon($content['Multidatabase']['title_icon']); ?>
								<?php echo h($content['Multidatabase']['title']); ?>
								<br>
								<small><?php echo h($content['Multidatabase']['sub_title']); ?></small>
							</h2>

						</div>


						<div class="col-md-4 col-xs-12" >
							<div class="pull-right h3">
								<?php echo $this->MultidatabaseUtil->getAnswerButtons($content); ?>
								<?php echo $this->MultidatabaseUtil->getAggregateButtons($content, array('icon' => 'stats')); ?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<?php if ($this->Workflow->canEdit('Multidatabase', $content)) : ?>
						<?php echo $this->element('Multidatabases.Multidatabases/detail_for_editor', array('multidatabase' => $content)); ?>
					<?php endif ?>
				</td></tr>
		<?php endforeach; ?>
	</table>

	<?php echo $this->element('NetCommons.paginator'); ?>

</article>
