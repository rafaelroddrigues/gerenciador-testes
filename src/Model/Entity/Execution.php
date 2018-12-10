<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Execution Entity
 *
 * @property int $id
 * @property string $status
 * @property int $test_cases_id
 * @property int $bugs_id
 * @property int $users_id
 * @property int $phases_id
 *
 * @property \App\Model\Entity\TestCase $test_case
 * @property \App\Model\Entity\Bug $bug
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Phase $phase
 */
class Execution extends Entity
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
        'status' => true,
        'projects_id' => true,
        'test_cases_id' => true,
        'users_id' => true,
        'phases_id' => true,
        'test_case' => true,
        'user' => true,
        'phase' => true
    ];
}
