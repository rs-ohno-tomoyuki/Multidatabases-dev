<?php
/**
 * Multidatabases No Contents View
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php echo $this->element('Multidatabases.scripts'); ?>

<article ng-controller="Multidatbabases">

	<?php echo $this->element('Multidatabases.Multidatabases/add_button'); ?>

	<div class="clearfix"></div>

	<p>
		<?php echo __d('multidatabases', 'no contents'); ?>
	</p>

</article>
