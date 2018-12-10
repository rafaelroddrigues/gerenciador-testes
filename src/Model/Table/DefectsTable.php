<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Defects Model
 *
 * @property \App\Model\Table\TestCaseStepsTable|\Cake\ORM\Association\BelongsTo $TestCaseSteps
 * @property \App\Model\Table\ExecutionsTable|\Cake\ORM\Association\BelongsTo $Executions
 *
 * @method \App\Model\Entity\Defect get($primaryKey, $options = [])
 * @method \App\Model\Entity\Defect newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Defect[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Defect|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Defect patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Defect[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Defect findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DefectsTable extends Table
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

        $this->setTable('defects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TestCaseSteps', [
            'foreignKey' => 'test_case_steps_id'
        ]);
        $this->belongsTo('Executions', [
            'foreignKey' => 'executions_id'
        ]);
	$this->belongsTo('Projects', [
            'foreignKey' => 'projects_id'
        ]);
	$this->belongsTo('Phases', [
            'foreignKey' => 'phases_id'
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
            ->scalar('status')
            ->notEmpty('status');

	$validator
            ->scalar('name')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->notEmpty('description');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));
        $rules->add($rules->existsIn(['projects_id'], 'Projects'));

        return $rules;
    }

}
