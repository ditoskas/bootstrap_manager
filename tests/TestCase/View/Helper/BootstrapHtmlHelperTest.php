<?php
namespace BootstrapManager\Test\TestCase\View\Helper;

use BootstrapManager\View\Helper\BootstrapHtmlHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * BootstrapManager\View\Helper\BootstrapHtmlHelper Test Case
 */
class BootstrapHtmlHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \BootstrapManager\View\Helper\BootstrapHtmlHelper
     */
    public $BootstrapHtml;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->BootstrapHtml = new BootstrapHtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BootstrapHtml);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
