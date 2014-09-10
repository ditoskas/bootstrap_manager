<?php
namespace BootstrapManager\Test\TestCase\View\Helper;

use Cake\View\View;
use BootstrapManager\View\Helper\BootstrapSourcesHelper;
use Cake\TestSuite\TestCase;

/**
 * BootstrapManager\View\Helper\BootstrapSourcesHelper Test Case
 */
class BootstrapSourcesHelperTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$view = new View();
		$this->BootstrapSources = new BootstrapSourcesHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BootstrapSources);

		parent::tearDown();
	}

}
