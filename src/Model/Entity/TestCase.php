<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestCase Entity
 *
 * @property int $id
 * @property string $name
 * @property string $summary
 * @property string $execution_type
 * @property int $test_plans_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TestPlan $test_plan
 * @property \App\Model\Entity\Precondition[] $preconditions
 * @property \App\Model\Entity\Requirement[] $requirements
 * @property \App\Model\Entity\TestCaseStep[] $test_case_steps
 */
class TestCase extends Entity
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
        'name' => true,
        'projects_id' => true,
        'summary' => true,
        'execution_type' => true,
        'test_plans_id' => true,
        'created' => true,
        'modified' => true,
        'test_plan' => true,
        'preconditions' => true,
        'requirements' => true,
        'test_case_steps' => true
    ];
}
