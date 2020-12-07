<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonaJuridica Model
 *
 * @method \App\Model\Entity\PersonaJuridica newEmptyEntity()
 * @method \App\Model\Entity\PersonaJuridica newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PersonaJuridica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonaJuridica get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonaJuridica findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PersonaJuridica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonaJuridica[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonaJuridica|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonaJuridica saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonaJuridica[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonaJuridica[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonaJuridica[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonaJuridica[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PersonaJuridicaTable extends Table
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

        $this->setTable('persona_juridica');
        $this->setDisplayField('per_jur_rif');
        $this->setPrimaryKey('per_jur_rif');
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
            ->scalar('per_jur_rif')
            ->maxLength('per_jur_rif', 50)
            ->allowEmptyString('per_jur_rif', null, 'create')
            ->add('per_jur_rif', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('per_jur_denominacion_comercial')
            ->maxLength('per_jur_denominacion_comercial', 50)
            ->requirePresence('per_jur_denominacion_comercial', 'create')
            ->notEmptyString('per_jur_denominacion_comercial')
            ->add('per_jur_denominacion_comercial', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('per_jur_razon_social')
            ->maxLength('per_jur_razon_social', 50)
            ->requirePresence('per_jur_razon_social', 'create')
            ->notEmptyString('per_jur_razon_social');

        $validator
            ->scalar('per_jur_pagina_web')
            ->maxLength('per_jur_pagina_web', 100)
            ->requirePresence('per_jur_pagina_web', 'create')
            ->notEmptyString('per_jur_pagina_web')
            ->add('per_jur_pagina_web', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->numeric('per_jur_capital_disponible')
            ->requirePresence('per_jur_capital_disponible', 'create')
            ->notEmptyString('per_jur_capital_disponible');

        $validator
            ->scalar('per_jur_direccion_fiscal')
            ->maxLength('per_jur_direccion_fiscal', 100)
            ->requirePresence('per_jur_direccion_fiscal', 'create')
            ->notEmptyString('per_jur_direccion_fiscal');

        $validator
            ->scalar('per_jur_direccion_fiscal_principal')
            ->maxLength('per_jur_direccion_fiscal_principal', 100)
            ->requirePresence('per_jur_direccion_fiscal_principal', 'create')
            ->notEmptyString('per_jur_direccion_fiscal_principal');

        $validator
            ->integer('FK_tie_codigo')
            ->requirePresence('FK_tie_codigo', 'create')
            ->notEmptyString('FK_tie_codigo');

        $validator
            ->integer('lugar')
            ->requirePresence('lugar', 'create')
            ->notEmptyString('lugar');

        $validator
            ->integer('lugar_fiscal')
            ->requirePresence('lugar_fiscal', 'create')
            ->notEmptyString('lugar_fiscal');

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
        $rules->add($rules->isUnique(['per_jur_rif']), ['errorField' => 'per_jur_rif']);
        $rules->add($rules->isUnique(['per_jur_denominacion_comercial']), ['errorField' => 'per_jur_denominacion_comercial']);
        $rules->add($rules->isUnique(['per_jur_pagina_web']), ['errorField' => 'per_jur_pagina_web']);

        return $rules;
    }
}
