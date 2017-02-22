<?php
/**
 * ActionMultidatabaseAdd Model
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

/**
 * Summary for ActionMultidatabaseAdd Model
 */
class ActionMultidatabaseAdd extends MultidatabasesAppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';


	/**
	 * Use behaviors
	 *
	 * @var array
	 */
	public $actsAs = [
		'Blocks.Block' => [
			'name' => 'Multidatabase.name',
			'loadModels' => [
				'Like' => 'Likes.Like',
				'BlockSetting' => 'Blocks.BlockSetting',
				//'WorkflowComment' => 'Workflow.WorkflowComment'
			]
		],
		'NetCommons.OriginalKey',
		/*
		'Workflow.Workflow',
		'Workflow.WorkflowComment',
		'AuthorizationKeys.AuthorizationKey',
		'Registrations.RegistrationValidate',
		'Mails.MailQueue' => [
			'embedTags' => [
				'X-SUBJECT' => 'Registration.title',
			],
			'publishStartField' => 'answer_start_period',
		],
		'Mails.MailQueueDelete',
		//新着情報
		'Topics.Topics' => [
			'fields' => [
				//※登録フォームの場合、'title'は$this->dataの値をセットしないので、
				//　ここではセットせずに、save直前で新着タイトルをセットする
				'publish_start' => 'answer_start_period',
				'answer_period_start' => 'answer_start_period',
				'answer_period_end' => 'answer_end_period',
				'path' => '/:plugin_key/registration_answers/view/:block_id/:content_key',
			],
			'search_contents' => [
				'title', 'sub_title'
			],
		],
		'Wysiwyg.Wysiwyg' => [
			'fields' => array['total_comment', 'thanks_content']
		],
		//多言語
		'M17n.M17n' => [
			'commonFields' => [
				'title_icon',
				'status',
				'is_active',
				'is_latest',
				'answer_timing',
				'answer_start_period',
				'answer_end_period',
				'is_no_member_allow',
				'is_anonymity',
				'is_key_pass_use',
				'is_repeat_allow',
				'is_total_show',
				'total_show_timing',
				'total_show_start_period',
				'is_image_authentication',
				'is_open_mail_send',
				'is_answer_mail_send',
				'reply_to',
				'is_regist_user_send',
				'is_page_random',
				'is_limit_number',
				'limit_number',
				'import_key',
				'export_key',
			],
			'associations' => [
				'RegistrationPage' => [
					'class' => 'Registrations.RegistrationPage',
					'foreignKey' => 'registration_id',
					'associations' => [
						'RegistrationQuestion' => [
							'class' => 'Registrations.RegistrationQuestion',
							'foreignKey' => 'registration_page_id',
							'associations' => [
								'RegistrationChoice' => [
									'class' => 'Registrations.RegistrationChoice',
									'foreignKey' => 'registration_question_id',
									'isM17n' => true,
								],
							],
							'isM17n' => true,
						],
					],
					'isM17n' => true,
				],
				'AuthorizationKey' => [
					'class' => 'AuthorizationKeys.AuthorizationKey',
					'foreignKey' => 'content_id',
					'fieldForIdentifyPlugin' => ['field' => 'model', 'value' => 'Registration'],
					'isM17n' => false
				],
			],
			'afterCallback' => false,
		],
		*/

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
		'Block' => [
			'className' => 'Blocks.Block',
			'foreignKey' => 'block_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		],
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
		'MultidatabaseContent' => [
			'className' => 'MultidatabaseContent',
			'foreignKey' => 'multidatabase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		],
		'MultidatabaseMetadata' => [
			'className' => 'MultidatabaseMetadata',
			'foreignKey' => 'multidatabase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		]
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
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);

		$this->loadModels(
			[
				'Frame' => 'Frames.Frame',
				'MultidatabaseContent' => 'Multidatabases.MultidatabaseContent',
				'MultidatabaseSetting' => 'Multidatabases.MultidatabaseSetting',
				'MultidatabaseFrameSetting' => 'Multidatabases.MultidatabaseFrameSetting',
				'MultidatabaseMetadata' => 'Multidatabases.MultidatabaseMetadata',
			]
		);


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
		//MultidatabaseSetting登録
		if (isset($this->MultidatabaseSetting->data['MultidatabaseSetting'])) {
			$this->MultidatabaseSetting->set($this->MultidatabaseSetting->data['MultidatabaseSetting']);
			$this->MultidatabaseSetting->save(null, false);
		}

		//MultidatabaseFrameSetting登録
		if (isset($this->MultidatabaseFrameSetting->data['MultidatabaseFrameSetting']) &&
			! $this->MultidatabaseFrameSetting->data['MultidatabaseFrameSetting']['id']) {

			if (! $this->MultidatabaseFrameSetting->save(null, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		}



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


	/**
	 * get index sql condition method
	 *
	 * @param array $addConditions 追加条件
	 * @return array
	 */
	public function getBaseCondition($addConditions = []) {
		$conditions = [];
		/*
		$conditions = $this->getWorkflowConditions(
			[
				'block_id' => Current::read('Block.id'),
			]
		);
		*/
		$conditions = array_merge($conditions, $addConditions);
		return $conditions;
	}


	/**
	 * Create Multidatabase data
	 *
	 * @return array
	 */
	public function createMultidatabase() {
		$multidatabase = $this->createAll(array(
			'Multidatabase' => array(
				'name' => __d('multidatabases', 'New multidatabase %s', date('YmdHis')),
			),
			'Block' => array(
				'room_id' => Current::read('Room.id'),
				'language_id' => Current::read('Language.id'),
			),

		));
		$multidatabase = Hash::merge($multidatabase, $this->MultidatabaseSetting->createBlockSetting());
		return $multidatabase;
	}


	/**
	 * Get Multidatabase data
	 *
	 * @return array
	 */


	public function getMultidatabase() {

		$multidatabase = $this->find('first', array(
			'recursive' => 0,
			'conditions' => $this->getBlockConditionById(),
		));

		if (! $multidatabase) {
			return $multidatabase;
		}

		return Hash::merge($multidatabase, $this->MultidatabaseSetting->getMultidatabaseSetting());
	}



	/**
	 * Save Multidatabases
	 *
	 * @param array $data received post data
	 * @return bool True on success, false on validation errors
	 * @throws InternalErrorException
	 */
	public function saveMultidatabase($data) {
		//トランザクションBegin
		$this->begin();

		//バリデーション
		$this->set($data);


		if (! $this->validates()) {
			return false;
		}

		try {
			//登録処理
//			if (! $this->save(null, false)) {
			$result = $this->saveAll();
			if (! $result) {
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

	/**
	 * Delete Multidatabases
	 *
	 * @param array $data received post data
	 * @return mixed On success Model::$data if its not empty or true, false on failure
	 * @throws InternalErrorException
	 */
	public function deleteMultidatabase($data) {
		//トランザクションBegin
		$this->begin();

		$conditions = array(
			$this->alias . '.key' => $data['Multidatabase']['key']
		);
		$multidatabases = $this->find('list', array(
			'recursive' => -1,
			'conditions' => $conditions,
		));
		$multidatabaseIds = array_keys($multidatabases);

		try {
			if (! $this->deleteAll(array($this->alias . '.key' => $data['Multidatabase']['key']), false, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$this->MultidatabaseContent->blockKey = $data['Block']['key'];
			$conditions = array($this->MultidatabaseContent->alias . '.multidatabase_id' => $multidatabaseIds);
			if (! $this->MultidatabaseContent->deleteAll($conditions, false, true)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$conditions = array($this->MultidatabaseMetadata->alias . '.multidatabase_id' => $data['Multidatabase']['id']);
			if (! $this->MultidatabaseMetadata->deleteAll($conditions, false, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			//Blockデータ削除
			$this->deleteBlock($data['Block']['key']);

			//トランザクションCommit
			$this->commit();

		} catch (Exception $ex) {
			//トランザクションRollback
			$this->rollback($ex);
		}

		return true;
	}


}

