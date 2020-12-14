<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CuentaUsuario Model
 *
 * @method \App\Model\Entity\CuentaUsuario newEmptyEntity()
 * @method \App\Model\Entity\CuentaUsuario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CuentaUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CuentaUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\CuentaUsuario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CuentaUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CuentaUsuario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CuentaUsuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CuentaUsuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CuentaUsuario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CuentaUsuario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CuentaUsuario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CuentaUsuario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CuentaUsuarioTable extends Table
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

        $this->setTable('cuenta_usuario');
        $this->setDisplayField('cue_usu_email');
        $this->setPrimaryKey('cue_usu_email');
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
            ->scalar('cue_usu_email')
            ->maxLength('cue_usu_email', 150)
            ->allowEmptyString('cue_usu_email', null, 'create')
            ->add('cue_usu_email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('cue_usu_contrasena')
            ->maxLength('cue_usu_contrasena', 400)
            ->requirePresence('cue_usu_contrasena', 'create')
            ->notEmptyString('cue_usu_contrasena');

        $validator
            ->integer('cue_usu_puntos')
            ->requirePresence('cue_usu_puntos', 'create')
            ->notEmptyString('cue_usu_puntos');

        $validator
            ->scalar('FK_persona_natural')
            ->maxLength('FK_persona_natural', 50)
            ->allowEmptyString('FK_persona_natural');

        $validator
            ->scalar('FK_persona_juridica')
            ->maxLength('FK_persona_juridica', 50)
            ->allowEmptyString('FK_persona_juridica');

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
        $rules->add($rules->isUnique(['cue_usu_email']), ['errorField' => 'cue_usu_email']);

        return $rules;
    }
}
