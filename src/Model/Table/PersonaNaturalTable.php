<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonaNatural Model
 *
 * @method \App\Model\Entity\PersonaNatural newEmptyEntity()
 * @method \App\Model\Entity\PersonaNatural newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PersonaNatural[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonaNatural get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonaNatural findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PersonaNatural patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonaNatural[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonaNatural|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonaNatural saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PersonaNaturalTable extends Table
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

        $this->setTable('persona_natural');
        $this->setDisplayField('per_nat_cedula');
        $this->setPrimaryKey('per_nat_cedula');
        $this->hasMany('telefono')
            ->setForeignKey('FK_persona_natural');
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
            ->scalar('per_nat_cedula')
            ->maxLength('per_nat_cedula', 50)
            ->requirePresence('per_nat_cedula', 'create')
            ->notEmptyString('per_nat_cedula')
            ->add('per_nat_cedula', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message'=>'Cedula Registrada']);

        $validator
            ->scalar('per_nat_rif')
            ->maxLength('per_nat_rif', 50)
            ->requirePresence('per_nat_rif', 'create')
            ->notEmptyString('per_nat_rif')
            ->add('per_nat_rif', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message'=>'Rif Registrado']);

        $validator
            ->scalar('per_nat_primer_nombre')
            ->maxLength('per_nat_primer_nombre', 50)
            ->requirePresence('per_nat_primer_nombre', 'create')
            ->notEmptyString('per_nat_primer_nombre');

        $validator
            ->scalar('per_nat_segundo_nombre')
            ->maxLength('per_nat_segundo_nombre', 50)
            ->allowEmptyString('per_nat_segundo_nombre');

        $validator
            ->scalar('per_nat_primer_apellido')
            ->maxLength('per_nat_primer_apellido', 50)
            ->requirePresence('per_nat_primer_apellido', 'create')
            ->notEmptyString('per_nat_primer_apellido');

        $validator
            ->scalar('per_nat_segundo_apellido')
            ->maxLength('per_nat_segundo_apellido', 50)
            ->allowEmptyString('per_nat_segundo_apellido');

        $validator
            ->scalar('per_nat_direccion')
            ->maxLength('per_nat_direccion', 300)
            ->requirePresence('per_nat_direccion', 'create')
            ->notEmptyString('per_nat_direccion');

        $validator
            ->integer('FK_tie_codigo')
            ->requirePresence('FK_tie_codigo', 'create')
            ->notEmptyString('FK_tie_codigo');

        $validator
            ->integer('FK_lug_codigo')
            ->requirePresence('FK_lug_codigo', 'create')
            ->notEmptyString('FK_lug_codigo');

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
        $rules->add($rules->isUnique(['per_nat_cedula']), ['errorField' => 'per_nat_cedula']);
        $rules->add($rules->isUnique(['per_nat_rif']), ['errorField' => 'per_nat_rif']);

        return $rules;
    }
}
