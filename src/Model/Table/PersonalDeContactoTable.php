<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonalDeContacto Model
 *
 * @method \App\Model\Entity\PersonalDeContacto newEmptyEntity()
 * @method \App\Model\Entity\PersonalDeContacto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PersonalDeContacto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonalDeContacto get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonalDeContacto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonalDeContacto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonalDeContacto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PersonalDeContactoTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('personal_de_contacto');
        $this->setDisplayField('per_con_codigo');
        $this->setPrimaryKey('per_con_codigo');
        $this->hasMany('telefono')
            ->setForeignKey('FK_personal_de_contacto');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('per_con_codigo')
            ->allowEmptyString('per_con_codigo', null, 'create')
            ->add('per_con_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('per_con_nombre')
            ->maxLength('per_con_nombre', 50)
            ->requirePresence('per_con_nombre', 'create')
            ->notEmptyString('per_con_nombre');

        $validator
            ->scalar('per_con_apellido')
            ->maxLength('per_con_apellido', 50)
            ->requirePresence('per_con_apellido', 'create')
            ->notEmptyString('per_con_apellido');
            
        $validator
            ->scalar('FK_pro_rif')
            ->maxLength('FK_pro_rif', 50)
            ->requirePresence('FK_pro_rif', 'create')
            ->notEmptyString('FK_pro_rif');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['per_con_codigo']), ['errorField' => 'per_con_codigo']);

        return $rules;
    }
}
