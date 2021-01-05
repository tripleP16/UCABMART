<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zona Model
 *
 * @property \App\Model\Table\PasilloTable&\Cake\ORM\Association\BelongsToMany $Pasillo
 * @property \App\Model\Table\ProductoTable&\Cake\ORM\Association\BelongsToMany $Producto
 *
 * @method \App\Model\Entity\Zona newEmptyEntity()
 * @method \App\Model\Entity\Zona newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Zona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zona findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Zona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zona[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zona|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zona saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zona[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zona[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zona[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zona[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ZonaTable extends Table
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

        $this->setTable('zona');
        $this->setDisplayField('zon_codigo');
        $this->setPrimaryKey('zon_codigo');

        $this->belongsToMany('Pasillo', [
            'foreignKey' => 'zona_id',
            'targetForeignKey' => 'pasillo_id',
            'joinTable' => 'zona_pasillo',
        ]);
        $this->belongsToMany('Producto', [
            'foreignKey' => 'zona_id',
            'targetForeignKey' => 'producto_id',
            'joinTable' => 'zona_producto',
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
            ->integer('zon_codigo')
            ->allowEmptyString('zon_codigo', null, 'create')
            ->add('zon_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('zon_nombre')
            ->maxLength('zon_nombre', 150)
            ->requirePresence('zon_nombre', 'create')
            ->notEmptyString('zon_nombre');

        $validator
            ->scalar('zon_refrigeracion')
            ->maxLength('zon_refrigeracion', 150)
            ->requirePresence('zon_refrigeracion', 'create')
            ->notEmptyString('zon_refrigeracion');

        $validator
            ->integer('zon_capacidad')
            ->requirePresence('zon_capacidad', 'create')
            ->notEmptyString('zon_capacidad');

        $validator
            ->integer('FK_alm_codigo')
            ->requirePresence('FK_alm_codigo', 'create')
            ->notEmptyString('FK_alm_codigo');

        $validator
            ->integer('FK_rub_codigo')
            ->requirePresence('FK_rub_codigo', 'create')
            ->notEmptyString('FK_rub_codigo');

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
        $rules->add($rules->isUnique(['zon_codigo']), ['errorField' => 'zon_codigo']);

        return $rules;
    }
}
