<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Defect Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $test_case_steps_id
 * @property int $executions_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TestCaseStep $test_case_step
 * @property \App\Model\Entity\Execution $execution
 */
class Defect extends Entity
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
	'name' => true,
        'description' => true,
	'projects_id' => true,
        'test_case_steps_id' => true,
        'executions_id' => true,
	'phases_id' => true,
        'created' => true,
        'modified' => true,
        'test_case_step' => true,
        'execution' => true
    ];
}
