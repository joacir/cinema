<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Generos Model
 *
 * @property \App\Model\Table\FilmesTable&\Cake\ORM\Association\HasMany $Filmes
 *
 * @method \App\Model\Entity\Genero newEmptyEntity()
 * @method \App\Model\Entity\Genero newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Genero[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Genero get($primaryKey, $options = [])
 * @method \App\Model\Entity\Genero findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Genero patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Genero[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Genero|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Genero saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Genero[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Genero[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Genero[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Genero[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GenerosTable extends Table
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

        $this->setTable('generos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Filmes', [
            'foreignKey' => 'genero_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->allowEmptyString('nome');

        return $validator;
    }
}
