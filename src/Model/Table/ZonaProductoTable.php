<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ZonaProducto Model
 *
 * @method \App\Model\Entity\ZonaProducto newEmptyEntity()
 * @method \App\Model\Entity\ZonaProducto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ZonaProducto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ZonaProducto get($primaryKey, $options = [])
 * @method \App\Model\Entity\ZonaProducto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ZonaProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ZonaProducto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ZonaProducto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ZonaProducto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ZonaProducto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ZonaProducto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ZonaProducto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ZonaProducto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ZonaProductoTable extends Table
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

        $this->setTable('zona_producto');
        $this->setDisplayField('prod_codigo');
        $this->setPrimaryKey(['prod_codigo', 'zon_codigo']);
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
            ->integer('zon_codigo')
            ->allowEmptyString('zon_codigo', null, 'create');

        $validator
            ->integer('zon_pro_cantidad_de_producto')
            ->requirePresence('zon_pro_cantidad_de_producto', 'create')
            ->notEmptyString('zon_pro_cantidad_de_producto');

        return $validator;
    }
}
