<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EstadoFactura Model
 *
 * @method \App\Model\Entity\EstadoFactura newEmptyEntity()
 * @method \App\Model\Entity\EstadoFactura newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFactura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFactura get($primaryKey, $options = [])
 * @method \App\Model\Entity\EstadoFactura findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EstadoFactura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFactura[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFactura|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstadoFactura saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstadoFactura[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EstadoFactura[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EstadoFactura[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EstadoFactura[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EstadoFacturaTable extends Table
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

        $this->setTable('estado_factura');
        $this->setDisplayField('est_codigo');
        $this->setPrimaryKey(['est_codigo', 'fac_numero']);
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
            ->integer('est_codigo')
            ->allowEmptyString('est_codigo', null, 'create');

        $validator
            ->integer('fac_numero')
            ->allowEmptyString('fac_numero', null, 'create');

        $validator
            ->dateTime('fac_fecha_hora')
            ->requirePresence('fac_fecha_hora', 'create')
            ->notEmptyDateTime('fac_fecha_hora');

        return $validator;
    }
}
