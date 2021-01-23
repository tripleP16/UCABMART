<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Producto Model
 *
 * @property \App\Model\Table\FacturaTable&\Cake\ORM\Association\BelongsToMany $Factura
 * @property \App\Model\Table\PasilloTable&\Cake\ORM\Association\BelongsToMany $Pasillo
 * @property \App\Model\Table\NotimartTable&\Cake\ORM\Association\BelongsToMany $Notimart
 * @property \App\Model\Table\ZonaTable&\Cake\ORM\Association\BelongsToMany $Zona
 *
 * @method \App\Model\Entity\Producto newEmptyEntity()
 * @method \App\Model\Entity\Producto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Producto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Producto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Producto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Producto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Producto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Producto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Producto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductoTable extends Table
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

        $this->setTable('producto');
        $this->setDisplayField('prod_codigo');
        $this->setPrimaryKey('prod_codigo');

        $this->belongsToMany('Factura', [
            'foreignKey' => 'prod_codigo',
            'targetForeignKey' => 'fac_numero',
            'joinTable' => 'factura_producto',
        ]);
        $this->belongsToMany('Pasillo', [
            'foreignKey' => 'prod_codigo',
            'targetForeignKey' => 'pasillo_id',
            'joinTable' => 'pasillo_producto',
        ]);
        $this->belongsToMany('Notimart', [
            'foreignKey' => 'prod_codigo',
            'targetForeignKey' => 'notimart_id',
            'joinTable' => 'producto_notimart',
        ]);
        $this->belongsToMany('Zona', [
            'foreignKey' => 'prod_codigo',
            'targetForeignKey' => 'zona_id',
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
            ->integer('prod_codigo')
            ->allowEmptyString('prod_codigo', null, 'create')
            ->add('prod_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('prod_nombre')
            ->maxLength('prod_nombre', 200)
            ->requirePresence('prod_nombre', 'create')
            ->notEmptyString('prod_nombre');

        $validator
            ->scalar('prod_descripcion')
            ->requirePresence('prod_descripcion', 'create')
            ->notEmptyString('prod_descripcion');

        $validator
            ->scalar('prod_imagen')
            ->maxLength('prod_imagen', 200)
            ->requirePresence('prod_imagen', 'create')
            ->notEmptyFile('prod_imagen');

        $validator
            ->numeric('prod_precio_bolivar')
            ->requirePresence('prod_precio_bolivar', 'create')
            ->notEmptyString('prod_precio_bolivar');

        $validator
            ->scalar('FK_submarca')
            ->maxLength('FK_submarca', 50)
            ->allowEmptyString('FK_submarca');

        $validator
            ->scalar('FK_proveedor')
            ->maxLength('FK_proveedor', 50)
            ->allowEmptyString('FK_proveedor');

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
        $rules->add($rules->isUnique(['prod_codigo']), ['errorField' => 'prod_codigo']);

        return $rules;
    }
}
