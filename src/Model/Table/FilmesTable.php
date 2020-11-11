<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Filmes Model
 *
 * @property \App\Model\Table\GenerosTable&\Cake\ORM\Association\BelongsTo $Generos
 * @property \App\Model\Table\CriticasTable&\Cake\ORM\Association\HasMany $Criticas
 * @property \App\Model\Table\AtorsTable&\Cake\ORM\Association\BelongsToMany $Ators
 *
 * @method \App\Model\Entity\Filme newEmptyEntity()
 * @method \App\Model\Entity\Filme newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Filme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Filme get($primaryKey, $options = [])
 * @method \App\Model\Entity\Filme findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Filme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Filme[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Filme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilmesTable extends Table
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

        $this->setTable('filmes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Crud');

        $this->belongsTo('Generos', [
            'foreignKey' => 'genero_id',
        ]);
        $this->hasMany('Criticas', [
            'foreignKey' => 'filme_id',
        ]);
        $this->belongsToMany('Ators', [
            'foreignKey' => 'filme_id',
            'targetForeignKey' => 'ator_id',
            'joinTable' => 'ators_filmes',
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
            ->notBlank('nome', _('Informe o nome, please'));

        $validator
            ->integer('ano')
            ->allowEmptyString('ano');

        $validator
            ->scalar('duracao')
            ->maxLength('duracao', 5)
            ->notBlank('duracao', _('Informe o duração, please'));

        $validator
            ->scalar('idioma')
            ->maxLength('idioma', 50)
            ->allowEmptyString('idioma');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn(['genero_id'], 'Generos'));

        return $rules;
    }
}
