<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TarjetaDeCredito Model
 *
 * @method \App\Model\Entity\TarjetaDeCredito newEmptyEntity()
 * @method \App\Model\Entity\TarjetaDeCredito newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito get($primaryKey, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TarjetaDeCredito[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TarjetaDeCreditoTable extends Table
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

        $this->setTable('tarjeta_de_credito');
        $this->setDisplayField('met_pag_numero');
        $this->setPrimaryKey('met_pag_numero');
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
            ->integer('met_pag_numero')
            ->requirePresence('met_pag_numero', 'create')
            ->notEmptyString('met_pag_numero');
            

        $validator
            ->scalar('tar_cre_nombre')
            ->maxLength('tar_cre_nombre', 50)
            ->requirePresence('tar_cre_nombre', 'create')
            ->notEmptyString('tar_cre_nombre');

        $validator
            ->date('tar_cre_fecha_emision')
            ->requirePresence('tar_cre_fecha_emision', 'create')
            ->notEmptyDate('tar_cre_fecha_emision');

        $validator
            ->integer('tar_cre_cvv')
            ->requirePresence('tar_cre_cvv', 'create')
            ->notEmptyString('tar_cre_cvv');

        $validator
            ->scalar('tar_cre_tipo')
            ->maxLength('tar_cre_tipo', 50)
            ->requirePresence('tar_cre_tipo', 'create')
            ->notEmptyString('tar_cre_tipo');

        $validator
            ->integer('FK_emi_codigo')
            ->requirePresence('FK_emi_codigo', 'create')
            ->notEmptyString('FK_emi_codigo');

        return $validator;
    }
}
