<?php

App::uses('AppController','Controller');


/**
 * MultidatabaseDataImportsController Controller
 * データインポート関連コントローラー
 *
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @package NetCommons\Multidatabases\Controller
 */
class MultidatabaseDataImportsController extends MultidatabasesAppController {

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

	];

/**
 * use components
 *
 * @var array
 */
	public $components = [

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

}
