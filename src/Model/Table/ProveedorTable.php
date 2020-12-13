<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proveedor Model
 *
 * @property \App\Model\Table\RubroTable&\Cake\ORM\Association\BelongsToMany $Rubro
 *
 * @method \App\Model\Entity\Proveedor newEmptyEntity()
 * @method \App\Model\Entity\Proveedor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Proveedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proveedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proveedor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Proveedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proveedor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proveedor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proveedor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proveedor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Proveedor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Proveedor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Proveedor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProveedorTable extends Table
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

        $this->setTable('proveedor');
        $this->setDisplayField('pro_rif');
        $this->setPrimaryKey('pro_rif');

        $this->belongsToMany('Rubro', [
            'foreignKey' => 'proveedor_id',
            'targetForeignKey' => 'rubro_id',
            'joinTable' => 'proveedor_rubro',
        ]);
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
            ->scalar('pro_rif')
            ->maxLength('pro_rif', 50)
            ->allowEmptyString('pro_rif', null, 'create')
            ->add('pro_rif', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('pro_razon_social')
            ->maxLength('pro_razon_social', 150)
            ->requirePresence('pro_razon_social', 'create')
            ->notEmptyString('pro_razon_social');

        $validator
            ->scalar('pro_denominacion_comercial')
            ->maxLength('pro_denominacion_comercial', 150)
            ->requirePresence('pro_denominacion_comercial', 'create')
            ->notEmptyString('pro_denominacion_comercial')
            ->add('pro_denominacion_comercial', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('pro_pagina_web')
            ->maxLength('pro_pagina_web', 150)
            ->requirePresence('pro_pagina_web', 'create')
            ->notEmptyString('pro_pagina_web')
            ->add('pro_pagina_web', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('pro_direccion_fisica')
            ->maxLength('pro_direccion_fisica', 150)
            ->requirePresence('pro_direccion_fisica', 'create')
            ->notEmptyString('pro_direccion_fisica');

        $validator
            ->scalar('pro_direccion_fiscal')
            ->maxLength('pro_direccion_fiscal', 150)
            ->requirePresence('pro_direccion_fiscal', 'create')
            ->notEmptyString('pro_direccion_fiscal');

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
        $rules->add($rules->isUnique(['pro_rif']), ['errorField' => 'pro_rif']);
        $rules->add($rules->isUnique(['pro_denominacion_comercial']), ['errorField' => 'pro_denominacion_comercial']);
        $rules->add($rules->isUnique(['pro_pagina_web']), ['errorField' => 'pro_pagina_web']);

        return $rules;
    }
}
