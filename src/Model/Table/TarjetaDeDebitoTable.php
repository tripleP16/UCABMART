<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TarjetaDeDebito Model
 *
 * @method \App\Model\Entity\TarjetaDeDebito newEmptyEntity()
 * @method \App\Model\Entity\TarjetaDeDebito newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito get($primaryKey, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TarjetaDeDebito[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TarjetaDeDebitoTable extends Table
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

        $this->setTable('tarjeta_de_debito');
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
            ->allowEmptyString('met_pag_numero', null, 'create');

        $validator
            ->scalar('tar_deb_tipo_cuenta')
            ->maxLength('tar_deb_tipo_cuenta', 50)
            ->requirePresence('tar_deb_tipo_cuenta', 'create')
            ->notEmptyString('tar_deb_tipo_cuenta');

        $validator
            ->scalar('tar_deb_tipo')
            ->maxLength('tar_deb_tipo', 50)
            ->requirePresence('tar_deb_tipo', 'create')
            ->notEmptyString('tar_deb_tipo');

        $validator
            ->integer('FK_emi_codigo')
            ->requirePresence('FK_emi_codigo', 'create')
            ->notEmptyString('FK_emi_codigo');

        $validator
            ->integer('tar_deb_cvv')
            ->requirePresence('tar_deb_cvv', 'create')
            ->notEmptyString('tar_deb_cvv');

        $validator
            ->date('tar_deb_fecha_emision')
            ->allowEmptyDate('tar_deb_fecha_emision');

        $validator
            ->scalar('tar_deb_titular')
            ->maxLength('tar_deb_titular', 300)
            ->requirePresence('tar_deb_titular', 'create')
            ->notEmptyString('tar_deb_titular');

        return $validator;
    }
}
