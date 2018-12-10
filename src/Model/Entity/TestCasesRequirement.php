<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestCasesRequirement Entity
 *
 * @property int $id
 * @property int $test_cases_id
 * @property int $requirements_id
 *
 * @property \App\Model\Entity\TestCase $test_case
 * @property \App\Model\Entity\Requirement $requirement
 */
class TestCasesRequirement extends Entity
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
        'requirements_id' => true,
        'test_case' => true,
        'requirement' => true
    ];
}
