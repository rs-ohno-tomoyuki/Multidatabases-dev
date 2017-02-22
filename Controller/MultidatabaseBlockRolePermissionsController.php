<?php

App::uses('MultidatabasesBlocksController','Multidatabases.Controller');


/**
 * MultidatabaseBlockRolePermissionsController Controller
 * 権限設定関連コントローラー
 *
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @package NetCommons\Multidatabases\Controller
 */
class MultidatabaseBlockRolePermissionsController extends MultidatabasesBlocksController {

/**
 * layout
 *
 * @var array
 */
	public $layout = 'NetCommons.setting';

/**
 * use model
 *
 * @var array
 */
	public $uses = [
		'Multidatabases.MultidatbaseSetting',
	];

/**
 * use helpers
 *
 * @var array
 */
	public $helpers = [
		'Blocks.BlockRolePermissionForm',
		'NetCommons.Date'
	];

/**
 * use components
 *
 * @var array
 */
	public $components = [
		'NetCommons.Permission' => array(
			//アクセスの権限
			'allow' => array(
				'edit' => 'block_permission_editable',
			),
		),
		'Multidatbases.MultidatabaseBlockTabs',
	];


/**
 * before filter
 */
	public function beforeFilter() {
		parent::beforeFilter();
	}

/**
 * before render
 */
	public function beforeRender() {
		parent::beforeFilter();
	}

/**
 * after filter
 */
	public function afterFilter() {
		parent::afterFilter();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

	}

/**
 *	edit method
 *
 * @return void
 */
	public function edit() {

	}

}
