<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tienda Model
 *
 * @method \App\Model\Entity\Tienda newEmptyEntity()
 * @method \App\Model\Entity\Tienda newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tienda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tienda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tienda findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tienda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tienda[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tienda|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tienda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tienda[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tienda[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tienda[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tienda[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TiendaTable extends Table
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

        $this->setTable('tienda');
        $this->setDisplayField('tie_codigo');
        $this->setPrimaryKey('tie_codigo');
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
            ->integer('tie_codigo')
            ->allowEmptyString('tie_codigo', null, 'create')
            ->add('tie_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('tie_direccion')
            ->maxLength('tie_direccion', 300)
            ->requirePresence('tie_direccion', 'create')
            ->notEmptyString('tie_direccion');

        $validator
            ->integer('tie_rif')
            ->requirePresence('tie_rif', 'create')
            ->notEmptyString('tie_rif')
            ->add('tie_rif', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('FK_alm_codigo')
            ->requirePresence('FK_alm_codigo', 'create')
            ->notEmptyString('FK_alm_codigo');

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
        $rules->add($rules->isUnique(['tie_codigo']), ['errorField' => 'tie_codigo']);
        $rules->add($rules->isUnique(['tie_rif']), ['errorField' => 'tie_rif']);

        return $rules;
    }
}
