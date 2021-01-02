<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Almacen Model
 *
 * @method \App\Model\Entity\Almacen newEmptyEntity()
 * @method \App\Model\Entity\Almacen newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Almacen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Almacen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Almacen findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Almacen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Almacen[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Almacen|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Almacen saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Almacen[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Almacen[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Almacen[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Almacen[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AlmacenTable extends Table
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

        $this->setTable('almacen');
        $this->setDisplayField('alm_codigo');
        $this->setPrimaryKey('alm_codigo');
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
            ->integer('alm_codigo')
            ->allowEmptyString('alm_codigo', null, 'create')
            ->add('alm_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('alm_dirección')
            ->maxLength('alm_dirección', 150)
            ->requirePresence('alm_dirección', 'create')
            ->notEmptyString('alm_dirección');

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
        $rules->add($rules->isUnique(['alm_codigo']), ['errorField' => 'alm_codigo']);

        return $rules;
    }
}
