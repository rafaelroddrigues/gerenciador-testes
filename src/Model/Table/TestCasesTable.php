<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestCases Model
 *
 * @property \App\Model\Table\TestPlansTable|\Cake\ORM\Association\BelongsTo $TestPlans
 * @property \App\Model\Table\PreconditionsTable|\Cake\ORM\Association\BelongsToMany $Preconditions
 * @property \App\Model\Table\RequirementsTable|\Cake\ORM\Association\BelongsToMany $Requirements
 * @property \App\Model\Table\TestCaseStepsTable|\Cake\ORM\Association\BelongsToMany $TestCaseSteps
 *
 * @method \App\Model\Entity\TestCase get($primaryKey, $options = [])
 * @method \App\Model\Entity\TestCase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TestCase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TestCase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestCase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TestCase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TestCase findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TestCasesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('test_cases');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TestPlans', [
            'foreignKey' => 'test_plans_id'
        ]);
        $this->belongsToMany('Preconditions', [
            'foreignKey' => 'test_cases_id',
            'targetForeignKey' => 'preconditions_id',
            'joinTable' => 'test_cases_preconditions'
        ]);
        $this->belongsToMany('Requirements', [
            'foreignKey' => 'test_cases_id',
            'targetForeignKey' => 'requirements_id',
            'joinTable' => 'test_cases_requirements'
        ]);
        $this->belongsToMany('TestCaseSteps', [
            'foreignKey' => 'test_cases_id',
            'targetForeignKey' => 'test_case_steps_id',
            'joinTable' => 'test_cases_test_case_steps'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'projects_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->notEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->notEmpty('name');

        $validator
            ->scalar('summary')
            ->notEmpty('summary');

        $validator
            ->scalar('execution_type')
            ->notEmpty('execution_type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
	$rules->add($rules->existsIn(['projects_id'], 'Projects'));
	$rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
