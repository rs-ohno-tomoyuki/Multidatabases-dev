<?php
/**
 * MultidatabaseContent Test Case
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

App::uses('MultidatabaseContent', 'Multidatabases.Model');

/**
 * Summary for MultidatabaseContent Test Case
 */
class MultidatabaseContentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.multidatabases.multidatabase_content',
		'plugin.multidatabases.user',
		'plugin.multidatabases.role',
		'plugin.multidatabases.user_role_setting',
		'plugin.multidatabases.users_language',
		'plugin.multidatabases.language'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MultidatabaseContent = ClassRegistry::init('Multidatabases.MultidatabaseContent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MultidatabaseContent);

		parent::tearDown();
	}

}
