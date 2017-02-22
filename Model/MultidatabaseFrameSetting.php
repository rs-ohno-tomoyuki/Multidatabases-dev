<?php
/**
 * MultidatabaseFrameSetting Model
 *
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., LTD.)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */


App::uses('MultidatabasesAppModel', 'Multidatabases.Model');
App::uses('NetCommonsUrl', 'NetCommons.Utility');


App::uses('MultidatabasesAppModel', 'Multidatabases.Model');
App::uses('NetCommonsUrl', 'NetCommons.Utility');

/**
 * Summary for MultidatabaseFrameSetting Model
 */
class MultidatabaseFrameSetting extends MultidatabasesAppModel {

/**
 * Use behaviors
 *
 * @var array
 */
	public $actsAs = [

	];

/**
 * Validateion rules
 * @var array
 */
	public $validate = [

	];

/**
 * belongsTo associations
 * *:1
 */
	public $belongsTo = [

	];

/**
 * hasOne associations
 * 1:1
 */
	public $hasOne = [

	];

/**
 * hasMany associations
 * 1:*
 */
	public $hasMany = [

	];

/**
 * hasAndBelongsToMany associations
 * *:*
 */
	public $hasAndBelongsToMany = [

	];

/**
 * Multidatabase constructor.
 */
	public function __construct() {
		parent::__construct();

	}

/**
 * beforeValidate
 */
	public function beforeValidate($options = array()) {
		parent::beforeValidate($options = array());

	}

/**
 * afterValidate
 */
	public function afterValidate() {
		parent::afterValidate();
	}


/**
 * beforeFind
 */
	public function beforeFind($query) {
		parent::beforeFind($query);
	}

/**
 * afterFind
 */
	public function afterFind($results, $primary = false) {
		parent::afterFind($results, $primary);

	}

/**
 * beforeSave
 */
	public function beforeSave($options = array()) {
		parent::beforeSave($options);

	}

/**
 * afterSave
 */
	public function afterSave($created, $options = array()) {
		parent::afterSave($created, $options);

	}

/**
 * beforeDelete
 */
	public function beforeDelete($cascade = true) {
		parent::beforeDelete($cascade);

	}

/**
 * afterDelete
 */
	public function afterDelete() {
		parent::afterDelete();

	}


	public function getMultidatabaseFrameSetting() {

		$conditions = array(
			'frame_key' => Current::read('Frame.key')
		);

		$multidatabaseFrameSetting = $this->find('first', array(
				'recursive' => -1,
				'conditions' => $conditions,
			)
		);

		if (!$multidatabaseFrameSetting) {
			$multidatabaseFrameSetting = $this->create(array(
				'frame_key' => Current::read('Frame.key'),
			));
		}

		return $multidatabaseFrameSetting;
	}

	public function saveMultidatabaseFrameSetting($data) {
		$this->loadModels([
			'MultidatabaseFrameSetting' => 'Multidatabases.MultidatabaseFrameSetting',
		]);

		//トランザクションBegin
		$this->begin();

		//バリデーション
		$this->set($data);
		if (!$this->validates()) {
			$this->rollback();
			return false;
		}

		try {
			//登録処理
			if (!$this->save(null, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			//トランザクションCommit
			$this->commit();
		} catch (Exception $ex) {
			//トランザクションRollback
			$this->rollback($ex);
		}

		return true;
	}


}
