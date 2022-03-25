<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Danger Entity
 *
 * @property int $id
 * @property string $acesso
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $role_id
 *
 * @property \App\Model\Entity\Role $role
 */
class Danger extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'acesso' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'role_id' => true,
        'role' => true,
    ];
}
