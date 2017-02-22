<?php

App::uses('AppController', 'Controller');

/**
 * Class MultidatabasesAppController
 */
class MultidatabasesAppController extends AppController {


/**
 * use model
 *
 * @var array
 */
	public $uses = [
		'Multidatabases.Multidatabase',
		'Multidatabases.MultidatabaseSetting',
		'Multidatabases.MultidatabaseFrameSetting',
		'Multidatabases.MultidatabaseContent'
	];

/**
 * use components
 *
 * @var array
 */
	public $components = [
		'Security',
		'Pages.PageLayout',
		'Multidatabases.Multidatabases',
	];

/**
 * use helper
 *
 * @var array
 */
	public $helpers = [

	];

/**
 * before filter
 */
	public function beforeFilter() {
	}

/**
 * before render
 */
	public function beforeRender() {

	}

/**
 * after filter
 */
	public function afterFilter() {
	}


/**
 * _decideSettingLayout
 * セッティング系の画面からの流れなのかどうかを判断し、レイアウトを決める
 *
 * @return void
 */
	protected function _decideSettingLayout() {
		/*
		$isSetting = Hash::get($this->request->params, 'named.q_mode');
		if ($isSetting == 'setting') {
			if (Current::permission('block_editable')) {
				$this->layout = 'NetCommons.setting';
			}
			return;
		}
		*/
	}


}
