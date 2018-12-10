<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestCaseStep Entity
 *
 * @property int $id
 * @property string $action
 * @property string $expected_results
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TestCase[] $test_cases
 */
class TestCaseStep extends Entity
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
        'projects_id' => true,
        'action' => true,
        'expected_results' => true,
        'created' => true,
        'modified' => true,
        'test_cases' => true
    ];
}
