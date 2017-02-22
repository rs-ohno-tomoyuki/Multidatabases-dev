<?php
/**
 * MultidatabaseContent Model
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
 * Summary for MultidatabaseContent Model
 */
class MultidatabaseContent extends MultidatabasesAppModel {

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
		'Multidatabase' => [
			'className' => 'Multidatabase',
			'foreignKey' => 'multidatabase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		],
		'Language' => [
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		],
		'Block' => [
			'className' => 'Block',
			'foreignKey' => 'block_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
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


}
