<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestCaseSteps Model
 *
 * @property \App\Model\Table\TestCasesTable|\Cake\ORM\Association\BelongsToMany $TestCases
 *
 * @method \App\Model\Entity\TestCaseStep get($primaryKey, $options = [])
 * @method \App\Model\Entity\TestCaseStep newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TestCaseStep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TestCaseStep|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestCaseStep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TestCaseStep[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TestCaseStep findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TestCaseStepsTable extends Table
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

        $this->setTable('test_case_steps');
        $this->setDisplayField('action');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('TestCases', [
            'foreignKey' => 'test_case_steps_id',
            'targetForeignKey' => 'test_cases_id',
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
            ->scalar('action')
            ->notEmpty('action');

        $validator
            ->scalar('expected_results')
            ->notEmpty('expected_results');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['action']));
        $rules->add($rules->existsIn(['projects_id'], 'Projects'));

        return $rules;
    }
}
