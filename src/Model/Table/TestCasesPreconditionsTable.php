<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestCasesPreconditions Model
 *
 * @property \App\Model\Table\TestCasesTable|\Cake\ORM\Association\BelongsTo $TestCases
 * @property \App\Model\Table\PreconditionsTable|\Cake\ORM\Association\BelongsTo $Preconditions
 *
 * @method \App\Model\Entity\TestCasesPrecondition get($primaryKey, $options = [])
 * @method \App\Model\Entity\TestCasesPrecondition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TestCasesPrecondition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TestCasesPrecondition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestCasesPrecondition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TestCasesPrecondition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TestCasesPrecondition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TestCasesPreconditionsTable extends Table
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

        $this->setTable('test_cases_preconditions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TestCases', [
            'foreignKey' => 'test_cases_id'
        ]);
        $this->belongsTo('Preconditions', [
            'foreignKey' => 'preconditions_id'
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
        $rules->add($rules->existsIn(['preconditions_id'], 'Preconditions'));

        return $rules;
    }
}
