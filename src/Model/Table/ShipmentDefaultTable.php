<?php
namespace App\Model\Table;

use App\Model\Entity\ShipmentDefault;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShipmentDefaults Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class ShipmentDefaultTable extends Table
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

        $this->table('shipment_defaults');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('sender_name', 'create')
            ->notEmpty('sender_name');

        $validator
            ->requirePresence('sender_company', 'create')
            ->notEmpty('sender_company');

        $validator
            ->requirePresence('sender_city', 'create')
            ->notEmpty('sender_city');

        $validator
            ->requirePresence('sender_state', 'create')
            ->notEmpty('sender_state');

        $validator
            ->requirePresence('sender_postcode', 'create')
            ->notEmpty('sender_postcode');

        $validator
            ->requirePresence('sender_country', 'create')
            ->notEmpty('sender_country');

        $validator
            ->requirePresence('receiver_name', 'create')
            ->notEmpty('receiver_name');

        $validator
            ->requirePresence('receiver_company', 'create')
            ->notEmpty('receiver_company');

        $validator
            ->requirePresence('receiver_city', 'create')
            ->notEmpty('receiver_city');

        $validator
            ->requirePresence('receiver_state', 'create')
            ->notEmpty('receiver_state');

        $validator
            ->requirePresence('receiver_postcode', 'create')
            ->notEmpty('receiver_postcode');

        $validator
            ->requirePresence('receiver_country', 'create')
            ->notEmpty('receiver_country');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
