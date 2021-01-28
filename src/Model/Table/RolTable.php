<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rol Model
 *
 * @property \App\Model\Table\CuentaUsuarioTable&\Cake\ORM\Association\BelongsToMany $CuentaUsuario
 *
 * @method \App\Model\Entity\Rol newEmptyEntity()
 * @method \App\Model\Entity\Rol newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rol[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rol get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rol findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rol patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rol[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rol|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rol saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rol[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rol[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rol[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rol[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RolTable extends Table
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

        $this->setTable('rol');
        $this->setDisplayField('rol_codigo');
        $this->setPrimaryKey('rol_codigo');

        $this->belongsToMany('CuentaUsuario', [
            'foreignKey' => 'rol_id',
            'targetForeignKey' => 'cuenta_usuario_id',
            'joinTable' => 'rol_cuenta_usuario',
        ]);
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
            ->integer('rol_codigo')
            ->allowEmptyString('rol_codigo', null, 'create')
            ->add('rol_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('rol_nombre')
            ->maxLength('rol_nombre', 150)
            ->requirePresence('rol_nombre', 'create')
            ->notEmptyString('rol_nombre');

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
        $rules->add($rules->isUnique(['rol_codigo']), ['errorField' => 'rol_codigo']);

        return $rules;
    }
}
