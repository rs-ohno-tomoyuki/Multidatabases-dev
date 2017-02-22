<?php
/**
 * Multidatabase BlockTabs Component
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Class MultidatabaseBlockTabsComponent
 */
class MultidatabaseBlockTabsComponent extends Component {

/**
 * initialize BlockTabsヘルパの設定
 *
 * @param Controller $controller コントローラ
 * @return void
 */
	public function initialize(Controller $controller) {
		$controller->helpers['Blocks.BlockTabs'] = [
			'mainTabs' => [
				'block_index' => [
					'url' => ['controller' => 'multidatabase_blocks']
				]
			],
			'blockTabs' => [
				'url' => ['controller' => 'multidatabase_block_role_permissions']
			],
			'mail_settings' => [
				'url' => ['controller' => 'multidatabase_mail_settings']
			],
			'import_data' => [
				'url' => ['controller' => 'multidatabase_data_imports']
			],
			'export_data' => [
				'url' => ['controller' => 'multidatabase_data_exports']
			]
		];
	}
}
