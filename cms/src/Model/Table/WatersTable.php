<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Waters Model
 *
 * @property \App\Model\Table\PlantsTable|\Cake\ORM\Association\BelongsTo $Plants
 *
 * @method \App\Model\Entity\Water get($primaryKey, $options = [])
 * @method \App\Model\Entity\Water newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Water[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Water|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Water saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Water patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Water[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Water findOrCreate($search, callable $callback = null, $options = [])
 */
class WatersTable extends Table
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

        $this->setTable('waters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Plants', [
            'foreignKey' => 'plant_id',
            'joinType' => 'INNER'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->dateTime('water_date')
            ->allowEmptyDateTime('water_date');

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
        $rules->add($rules->existsIn(['plant_id'], 'Plants'));

        return $rules;
    }
}
