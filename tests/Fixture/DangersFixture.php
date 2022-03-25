<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DangersFixture
 */
class DangersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'acesso' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'L',
                'created' => '2022-03-10 19:42:30',
                'modified' => '2022-03-10 19:42:30',
                'role_id' => 1,
            ],
        ];
        parent::init();
    }
}
