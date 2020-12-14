<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Telefono Model
 *
 * @method \App\Model\Entity\Telefono newEmptyEntity()
 * @method \App\Model\Entity\Telefono newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Telefono[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Telefono get($primaryKey, $options = [])
 * @method \App\Model\Entity\Telefono findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Telefono patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Telefono[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Telefono|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Telefono saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Telefono[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Telefono[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Telefono[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Telefono[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TelefonoTable extends Table
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

        $this->setTable('telefono');
        $this->setDisplayField('tel_numero');
        $this->setPrimaryKey('tel_numero');
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
            ->integer('tel_numero')
            ->allowEmptyString('tel_numero', null, 'create')
            ->add('tel_numero', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('tel_tipo')
            ->maxLength('tel_tipo', 50)
            ->requirePresence('tel_tipo', 'create')
            ->notEmptyString('tel_tipo');

        $validator
            ->scalar('FK_persona_natural')
            ->maxLength('FK_persona_natural', 50)
            ->allowEmptyString('FK_persona_natural');

        $validator
            ->scalar('FK_persona_juridica')
            ->maxLength('FK_persona_juridica', 50)
            ->allowEmptyString('FK_persona_juridica');

        $validator
            ->integer('FK_personal_de_contacto')
            ->allowEmptyString('FK_personal_de_contacto');

        $validator
            ->scalar('FK_empleado')
            ->maxLength('FK_empleado', 50)
            ->allowEmptyString('FK_empleado');

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
        $rules->add($rules->isUnique(['tel_numero']), ['errorField' => 'tel_numero']);

        return $rules;
    }
}
