<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestCasesRequirements Model
 *
 * @property \App\Model\Table\TestCasesTable|\Cake\ORM\Association\BelongsTo $TestCases
 * @property \App\Model\Table\RequirementsTable|\Cake\ORM\Association\BelongsTo $Requirements
 *
 * @method \App\Model\Entity\TestCasesRequirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\TestCasesRequirement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TestCasesRequirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TestCasesRequirement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestCasesRequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TestCasesRequirement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TestCasesRequirement findOrCreate($search, callable $callback = null, $options = [])
 */
class TestCasesRequirementsTable extends Table
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

        $this->setTable('test_cases_requirements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TestCases', [
            'foreignKey' => 'test_cases_id'
        ]);
        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirements_id'
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
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['test_cases_id'], 'TestCases'));
        $rules->add($rules->existsIn(['requirements_id'], 'Requirements'));

        return $rules;
    }
}
