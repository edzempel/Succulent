<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Photos Model
 *
 * @property \App\Model\Table\PlantsTable|\Cake\ORM\Association\BelongsTo $Plants
 *
 * @method \App\Model\Entity\Photo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Photo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Photo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Photo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Photo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Photo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Photo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Photo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhotosTable extends Table
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

        $this->setTable('photos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
                // You can configure as many upload fields as possible,
                // where the pattern is `field` => `config`
                //
                // Keep in mind that while this plugin does not have any limits in terms of
                // number of files uploaded per request, you should keep this down in order
                // to decrease the ability of your users to block other requests.
                'photo' => [
                    'path' => 'webroot{DS}img{DS}{model}{DS}{field-value:plant_id}{DS}',
                    'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                        // https://github.com/FriendsOfCake/cakephp-upload/blob/master/docs/configuration.rst
                        $name = $data['name'];
                        // replace white space and underscores with hyphens
                        $name = preg_replace('/[_\s]/', '-', $name);
                        return strtolower($name);
                    },
                    'keepFilesOnDelete' => false

                ]
            ]
        );

        $this->addBehavior('Timestamp');

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
//            ->scalar('photo')
//            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            ->scalar('dir')
            ->maxLength('dir', 255)
            ->allowEmptyString('dir');

        $validator
            ->scalar('size')
            ->maxLength('size', 255)
            ->allowEmptyString('size');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

        $validator
            ->boolean('is_profile')
            ->allowEmptyFile('is_profile');

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
