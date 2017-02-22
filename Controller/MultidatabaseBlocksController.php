<?php

App::uses('AppController','Controller');


/**
 * MultidatabaseBlocksController Controller
 * ブロック設定関連コントローラー
 *
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @package NetCommons\Multidatabases\Controller
 */
class MultidatabaseBlocksController extends MultidatabasesAppController {


/**
 * layout
 *
 * @var string
 */
	public $layout = 'NetCommons.setting';

/**
 * use model
 *
 * @var array
 */
	public $uses = [
		'Multidatabases.Multidatabase',
		'Multidatabases.MultidatabaseFrameSetting',
		'Blocks.Block'
	];

/**
 * use helpers
 *
 * @var array
 */
	public $helpers = [
		'Session',
		'Blocks.BlockForm',
		'Blocks.BlockTabs' => [
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
		],
		'Blocks.BlockIndex',
		'NetCommons.NetCommonsForm',
		'NetCommons.Date',
		'NetCommons.TitleIcon',
	];

/**
 * use components
 *
 * @var array
 */
	public $components = [
		'NetCommons.Permission' => [
			'allow' => [
				'index,add,edit,delete,import,export' => 'block_editable',
			]
		],
		'Paginator',
	];



/**
 * index
 *
 * @return void
 */

	public function index() {
		var_dump(Current::read());exit;
		$this->Paginator->settings = [
			'Multidatabase' => $this->Multidatabase->getBlockIndexSettings()
		];
		$multidatabases = $this->Paginator->paginate('Multidatabase');

		if (!$multidatabases) {
			$this->view = 'Blocks.Blocks/not_found';
			return;
		}
		$this->set('multidatabases', $multidatabases);
		$this->request->data['Frame'] = Current::read('Frame');
	}

/**
 * _setFlashMessageAndRedirect
 *
 * @param string $message flash error message
 *
 * @return void
 */
	protected function _setFlashMessageAndRedirect($message) {
		$this->NetCommons->setFlashNotification(
			$message,
			array(
				'interval' => NetCommonsComponent::ALERT_VALIDATE_ERROR_INTERVAL
			));
		$this->redirect(NetCommonsUrl::actionUrl(
			[
				'controller' => 'multidatabase_blocks',
				'action' => 'index',
				'frame_id' => Current::read('Frame.id')
			]
		));
	}



}
