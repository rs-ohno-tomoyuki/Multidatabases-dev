<?php

App::uses('AppController','Controller');


/**
 * MultidatabasesController Controller
 * 汎用データベースコントローラー
 *
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @package NetCommons\Multidatabases\Controller
 */
class MultidatabasesController extends MultidatabasesAppController {

/**
 * use model
 *
 * @var array
 */
	public $uses = [

	];

/**
 * use helpers
 *
 * @var array
 */
	public $helpers = [
		//'Workflow.Workflow',
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
		'NetCommons.Permission' => array(
			//アクセスの権限
			'allow' => array(
				'edit,delete' => 'content_creatable',
			),
		),
		'Multidatabases.Multidatabases',
		'Paginator',
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
		if (Current::permission('content_creatable')) {
			// 追加ボタン表示
			$this->view = 'Multidatabases/noRegistration';
		} else {
			$this->setAction('emptyRender');
		}
	}



}
