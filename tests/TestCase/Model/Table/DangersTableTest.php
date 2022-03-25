<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DangersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DangersTable Test Case
 */
class DangersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DangersTable
     */
    protected $Dangers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dangers',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dangers') ? [] : ['className' => DangersTable::class];
        $this->Dangers = $this->getTableLocator()->get('Dangers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Dangers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DangersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DangersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
