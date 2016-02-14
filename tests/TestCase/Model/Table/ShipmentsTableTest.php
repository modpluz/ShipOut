<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShipmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShipmentsTable Test Case
 */
class ShipmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShipmentsTable
     */
    public $Shipments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shipments',
        'app.shippo_objects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shipments') ? [] : ['className' => 'App\Model\Table\ShipmentsTable'];
        $this->Shipments = TableRegistry::get('Shipments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shipments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}