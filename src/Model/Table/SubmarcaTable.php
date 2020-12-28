<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Submarca Model
 *
 * @method \App\Model\Entity\Submarca newEmptyEntity()
 * @method \App\Model\Entity\Submarca newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Submarca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Submarca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Submarca findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Submarca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Submarca[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Submarca|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Submarca saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Submarca[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Submarca[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Submarca[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Submarca[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SubmarcaTable extends Table
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

        $this->setTable('submarca');
        $this->setDisplayField('sub_nombre');
        $this->setPrimaryKey('sub_nombre');
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
            ->scalar('sub_nombre')
            ->maxLength('sub_nombre', 50)
            ->allowEmptyString('sub_nombre', null, 'create')
            ->add('sub_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('sub_descripcion')
            ->maxLength('sub_descripcion', 250)
            ->requirePresence('sub_descripcion', 'create')
            ->notEmptyString('sub_descripcion');

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
        $rules->add($rules->isUnique(['sub_nombre']), ['errorField' => 'sub_nombre']);

        return $rules;
    }
}
