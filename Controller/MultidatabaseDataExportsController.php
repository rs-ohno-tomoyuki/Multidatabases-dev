<?php

App::uses('AppController','Controller');
App::uses('TemporaryFolder', 'Files.Utility');
App::uses('CsvFileWriter', 'Files.Utility');
App::uses('ZipDownloader', 'Files.Utility');

/**
 * MultidatabaseDataImportsController Controller
 * データエクスポート関連コントローラー
 *
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @package NetCommons\Multidatabases\Controller
 */
class MultidatabaseDataExportsController extends MultidatabasesAppController {

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
