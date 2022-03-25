<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 */
class RolesFixture extends TestFixture
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
                'papel' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'L',
                'created' => '2022-03-10 19:42:17',
                'modified' => '2022-03-10 19:42:17',
            ],
        ];
        parent::init();
    }
}
