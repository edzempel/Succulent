<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plants Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PhotosTable|\Cake\ORM\Association\HasMany $Photos
 * @property \App\Model\Table\PotsTable|\Cake\ORM\Association\HasMany $Pots
 * @property \App\Model\Table\WatersTable|\Cake\ORM\Association\HasMany $Waters
 *
 * @method \App\Model\Entity\Plant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlantsTable extends Table
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

        $this->setTable('plants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Photos', [
            'foreignKey' => 'plant_id'
        ]);
        $this->hasMany('Pots', [
            'foreignKey' => 'plant_id'
        ]);
        $this->hasMany('Waters', [
            'foreignKey' => 'plant_id'
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
            ->scalar('scientific_name')
            ->maxLength('scientific_name', 255)
            ->allowEmptyString('scientific_name');

        $validator
            ->scalar('common_name')
            ->maxLength('common_name', 255)
            ->allowEmptyString('common_name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 191)
            ->requirePresence('slug', 'create')
            ->allowEmptyString('slug', false)
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

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
        $rules->add($rules->isUnique(['slug']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
