<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductoNotimart Model
 *
 * @method \App\Model\Entity\ProductoNotimart newEmptyEntity()
 * @method \App\Model\Entity\ProductoNotimart newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductoNotimart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductoNotimart get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductoNotimart findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductoNotimart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductoNotimart[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductoNotimart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductoNotimart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductoNotimart[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductoNotimart[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductoNotimart[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductoNotimart[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductoNotimartTable extends Table
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

        $this->setTable('producto_notimart');
        $this->setDisplayField('prod_not_codigo');
        $this->setPrimaryKey('prod_not_codigo');
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
            ->integer('prod_not_codigo')
            ->allowEmptyString('prod_not_codigo', null, 'create')
            ->add('prod_not_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('prod_not_descuento')
            ->requirePresence('prod_not_descuento', 'create')
            ->notEmptyString('prod_not_descuento');

        $validator
            ->date('prod_not_fecha_inicio')
            ->requirePresence('prod_not_fecha_inicio', 'create')
            ->notEmptyDate('prod_not_fecha_inicio');

        $validator
            ->date('prod_not_fecha_FIN')
            ->requirePresence('prod_not_fecha_FIN', 'create')
            ->notEmptyDate('prod_not_fecha_FIN');

        $validator
            ->integer('FK_prod_codigo')
            ->requirePresence('FK_prod_codigo', 'create')
            ->notEmptyString('FK_prod_codigo');

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
        $rules->add($rules->isUnique(['prod_not_codigo']), ['errorField' => 'prod_not_codigo']);

        return $rules;
    }
}
