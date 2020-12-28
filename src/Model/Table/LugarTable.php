<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lugar Model
 *
 * @method \App\Model\Entity\Lugar newEmptyEntity()
 * @method \App\Model\Entity\Lugar newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lugar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lugar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lugar findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lugar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lugar[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lugar|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lugar saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lugar[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lugar[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lugar[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lugar[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LugarTable extends Table
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

        $this->setTable('lugar');
        $this->setDisplayField('lug_codigo');
        $this->setPrimaryKey('lug_codigo');
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
            ->integer('lug_codigo')
            ->allowEmptyString('lug_codigo', null, 'create')
            ->add('lug_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('lug_nombre')
            ->maxLength('lug_nombre', 50)
            ->requirePresence('lug_nombre', 'create')
            ->notEmptyString('lug_nombre');

        $validator
            ->scalar('lug_tipo')
            ->maxLength('lug_tipo', 50)
            ->requirePresence('lug_tipo', 'create')
            ->notEmptyString('lug_tipo');

        $validator
            ->integer('FK_lug_código')
            ->allowEmptyString('FK_lug_código');

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
        $rules->add($rules->isUnique(['lug_codigo']), ['errorField' => 'lug_codigo']);

        return $rules;
    }
}
