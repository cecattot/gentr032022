<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'siape' => 'Lo',
                'nome' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'L',
                'created' => '2022-03-10 19:42:23',
                'modified' => '2022-03-10 19:42:23',
                'role_id' => 1,
            ],
        ];
        parent::init();
    }
}
