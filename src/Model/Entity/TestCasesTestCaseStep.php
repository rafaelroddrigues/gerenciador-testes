<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestCasesTestCaseStep Entity
 *
 * @property int $id
 * @property int $test_cases_id
 * @property int $test_case_steps_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TestCase $test_case
 * @property \App\Model\Entity\TestCaseStep $test_case_step
 */
class TestCasesTestCaseStep extends Entity
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
        'test_cases_id' => true,
        'test_case_steps_id' => true,
        'created' => true,
        'modified' => true,
        'test_case' => true,
        'test_case_step' => true
    ];
}
