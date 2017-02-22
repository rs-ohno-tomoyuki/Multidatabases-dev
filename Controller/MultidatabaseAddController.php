<?php

App::uses('AppController','Controller');


/**
 * MultidatabaseAddController Controller
 * 汎用データベース追加関連コントローラー
 *
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @package NetCommons\Multidatabases\Controller
 */
class MultidatabaseAddController extends MultidatabasesAppController {

/**
 * use model
 *
 * @var array
 */
	public $uses = [
		'Files.FileModel',
		'PluginManager.Plugin',
	];

/**
 * use helpers
 *
 * @var array
 */
	public $helpers = [
		'Multidatabases.MultidatabaseUtil',
		'NetCommons.Date',
		'NetCommons.DisplayNumber',
		'NetCommons.Button',
		'NetCommons.TitleIcon',
	];

/**
 * use components
 *
 * @var array
 */
	public $components = [
		'Files.FileUpload',
		'NetCommons.Permission' => [
			'allow' => [
				'add' => 'content_creatable',
			],
		],
		'Multidatabases.Multidatabases',
		'Multidatabases.MultidatabaseBlockTabs',
	];


/**
 * before filter
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->_decideSettingLayout();
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

	public function add() {

		var_dump(Current::read());
		exit;
		// お約束処理
		unset($this->helpers['Blocks.BlockTabs']['blockTabs']['role_permissions']);
		unset($this->helpers['Blocks.BlockTabs']['blockTabs']['mail_settings']);
		unset($this->helpers['Blocks.BlockTabs']['blockTabs']['answer_list']);

		if ($this->request->is('post')) {
			// Postデータをもとにした新登録フォームデータの取得をModelに依頼する
			$actionModel = ClassRegistry::init('Multidatabases.ActionMultidatabaseAdd', 'true');

			if ($multidatabase = $actionModel->createMultidatabase($this->request->data)) {
				$tm = $this->_getMultidatabaseEditSessionIndex();
				// 作成中登録フォームデータをセッションキャッシュに書く
				$this->Session->write('Multidatabases.multidatabaseEdit.' . $tm, $multidatabase);

				// 次の画面へリダイレクト
				$urlArray = array(
					'controller' => 'multidatabase_edit',
					'action' => 'edit_database',
					Current::read('Block.id'),
					'frame_id' => Current::read('Frame.id'),
					's_id' => $tm,
				);
				if ($this->layout == 'NetCommons.setting') {
					$urlArray['q_mode'] = 'setting';
				}
				$this->redirect(NetCommonsUrl::actionUrl($urlArray));
				return;
			} else {
				// データに不備があった場合
				$this->NetCommons->handleValidationError($actionModel->validationErrors);
			}
		} else {
			// 新規に登録フォームを作成するときは最初にブロックをつくっておく
			$frame['Frame'] = Current::read('Frame');
			$this->Multidatabase->createBlock($frame);
		}

		// 過去データ 取り出し
		$conditions = Hash::remove($this->Multidatabase->getBaseCondition(), 'block_id');
		$conditions['Block.room_id'] = Current::read('Room.id');
		$pastMultidatabases = $this->Multidatabase->find('all',
			array(
				'fields' => array(
					'id', 'title', 'status', 'answer_timing', 'answer_start_period', 'answer_end_period',
				),

				'conditions' => $conditions,
				'offset' => 0,
				'limit' => 1000,
				'recursive' => 0,
				'order' => array('Multidatabase.modified DESC'),
			));
		$this->set('pastMultidatabases', $pastMultidatabases);

		if ($this->layout == 'NetCommons.setting') {
			$this->set('cancelUrl', NetCommonsUrl::backToIndexUrl('default_setting_action'));
		} else {
			$this->set('cancelUrl', NetCommonsUrl::backToPageUrl());
		}
		//
		// NetCommonsお約束：投稿のデータはrequest dataに設定する
		//
		$this->request->data['Frame'] = Current::read('Frame');
		$this->request->data['Block'] = Current::read('Block');
		// create_optionが未設定のときは初期値として「ＮＥＷ」を設定する
		if (! $this->request->data('ActionMultidatabaseAdd.create_option')) {
			$this->request->data(
				'ActionMultidatabaseAdd.create_option',
				MultidatabasesComponent::REGISTRATION_CREATE_OPT_NEW);
		}

	}




}
