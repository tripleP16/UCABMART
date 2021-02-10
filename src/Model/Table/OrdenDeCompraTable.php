<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdenDeCompra Model
 *
 * @method \App\Model\Entity\OrdenDeCompra newEmptyEntity()
 * @method \App\Model\Entity\OrdenDeCompra newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDeCompra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDeCompra get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDeCompra[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDeCompra|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdenDeCompra[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrdenDeCompraTable extends Table
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

        $this->setTable('orden_de_compra');
        $this->setDisplayField('ord_com_numero');
        $this->setPrimaryKey('ord_com_numero');
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
            ->integer('ord_com_numero')
            ->allowEmptyString('ord_com_numero', null, 'create');

        $validator
            ->date('ord_com_fecha_creada')
            ->requirePresence('ord_com_fecha_creada', 'create')
            ->notEmptyDate('ord_com_fecha_creada');

        $validator
            ->date('ord_com_fecha_despacho')
            ->allowEmptyDate('ord_com_fecha_despacho');

        $validator
            ->scalar('ord_com_pagada')
            ->maxLength('ord_com_pagada', 50)
            ->requirePresence('ord_com_pagada', 'create')
            ->notEmptyString('ord_com_pagada');

        $validator
            ->scalar('FK_pro_rif')
            ->maxLength('FK_pro_rif', 50)
            ->requirePresence('FK_pro_rif', 'create')
            ->notEmptyString('FK_pro_rif');

        $validator
            ->integer('FK_tie_codigo')
            ->requirePresence('FK_tie_codigo', 'create')
            ->notEmptyString('FK_tie_codigo');

        return $validator;
    }
}
