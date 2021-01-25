<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarritoDeComprasVirtual Model
 *
 * @method \App\Model\Entity\CarritoDeComprasVirtual newEmptyEntity()
 * @method \App\Model\Entity\CarritoDeComprasVirtual newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual get($primaryKey, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CarritoDeComprasVirtualTable extends Table
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

        $this->setTable('carrito_de_compras_virtual');
        $this->setDisplayField('prod_codigo');
        $this->setPrimaryKey(['prod_codigo', 'cue_usu_email']);
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
            ->integer('prod_codigo')
            ->allowEmptyString('prod_codigo', null, 'create');

        $validator
            ->scalar('cue_usu_email')
            ->maxLength('cue_usu_email', 150)
            ->allowEmptyString('cue_usu_email', null, 'create');

        $validator
            ->integer('car_unidades_de_producto')
            ->requirePresence('car_unidades_de_producto', 'create')
            ->notEmptyString('car_unidades_de_producto');

        $validator
            ->integer('car_com_precio')
            ->requirePresence('car_com_precio', 'create')
            ->notEmptyString('car_com_precio');

        return $validator;
    }
}
