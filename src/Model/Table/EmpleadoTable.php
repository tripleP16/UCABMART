<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empleado Model
 *
 * @property \App\Model\Table\BeneficioTable&\Cake\ORM\Association\BelongsToMany $Beneficio
 *
 * @method \App\Model\Entity\Empleado newEmptyEntity()
 * @method \App\Model\Entity\Empleado newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Empleado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empleado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empleado findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Empleado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empleado[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empleado|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empleado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Empleado[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EmpleadoTable extends Table
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

        $this->setTable('empleado');
        $this->setDisplayField('emp_cedula');
        $this->setPrimaryKey('emp_cedula');
        $this->hasMany('telefono')
            ->setForeignKey('FK_empleado');
        $this->hasOne('cuenta_usuario')
            ->setForeignKey('FK_empleado');
        $this->hasMany('beneficio_empleado')
            ->setForeignKey('ben_codigo');
        
        



        $this->belongsToMany('Beneficio', [
            'foreignKey' => 'empleado_id',
            'targetForeignKey' => 'beneficio_id',
            'joinTable' => 'beneficio_empleado',
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
            ->scalar('emp_cedula')
            ->maxLength('emp_cedula', 50)
            ->notEmptyString('emp_cedula')
            ->requirePresence('emp_cedula', 'create');

        $validator
            ->scalar('emp_primer_nombre')
            ->maxLength('emp_primer_nombre', 300)
            ->requirePresence('emp_primer_nombre', 'create')
            ->notEmptyString('emp_primer_nombre');

        $validator
            ->scalar('emp_segundo_nombre')
            ->maxLength('emp_segundo_nombre', 300)
            ->allowEmptyString('emp_segundo_nombre');

        $validator
            ->scalar('emp_primer_apellido')
            ->maxLength('emp_primer_apellido', 300)
            ->requirePresence('emp_primer_apellido', 'create')
            ->notEmptyString('emp_primer_apellido');

        $validator
            ->scalar('emp_segundo_apellido')
            ->maxLength('emp_segundo_apellido', 300)
            ->allowEmptyString('emp_segundo_apellido');

        $validator
            ->scalar('emp_direccion_hab')
            ->maxLength('emp_direccion_hab', 300)
            ->requirePresence('emp_direccion_hab', 'create')
            ->notEmptyString('emp_direccion_hab');

        $validator
            ->integer('FK_lug_codigo')
            ->requirePresence('FK_lug_codigo', 'create')
            ->notEmptyString('FK_lug_codigo');

        return $validator;
    }
}
