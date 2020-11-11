<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Criticas Model
 *
 * @property \App\Model\Table\FilmesTable&\Cake\ORM\Association\BelongsTo $Filmes
 *
 * @method \App\Model\Entity\Critica newEmptyEntity()
 * @method \App\Model\Entity\Critica newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Critica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Critica get($primaryKey, $options = [])
 * @method \App\Model\Entity\Critica findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Critica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Critica[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Critica|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Critica saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Critica[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critica[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critica[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Critica[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CriticasTable extends Table
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

        $this->setTable('criticas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Crud');

        $this->belongsTo('Filmes', [
            'foreignKey' => 'filme_id',
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
            ->notBlank('nome', __('Informe o nome'))
            ->minLength('nome', 3, __('Informe um nome com mais de 2 dígitos'));

        $validator
            ->integer('avaliacao')
            ->notBlank('avaliacao', __('Informe o avaliação'))
            ->range('avaliacao', [1, 5], __('Informe uma avaliação de 1 á 5'));

        $validator
            ->notBlank('data_avaliacao', __('Informe a data de avaliação'))
            ->date('data_avaliacao', ['dmy'], __('Data de avaliação inválida'));

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
        $rules->add($rules->existsIn(['filme_id'], 'Filmes'));

        $rules->add(
            function($entity, $options) {
                $anoMaiorIgualFilme = true;
                if (!empty($entity->data_avaliacao) && $entity->filme_id) {
                    $filme = $this->Filmes->get($entity->filme_id, ['fields' => ['ano']]);
                    $ano = $entity->data_avaliacao->format('Y');
                    $anoMaiorIgualFilme = $ano >= $filme->ano;
                }
                return $anoMaiorIgualFilme;
            }, 
            'anoMaiorIgualFilme',
            [
                'errorField' => 'data_avaliacao',
                'message' => 'Ano de avaliação deve ser igual ou superior ao ano do Filme'
            ]
        );

        return $rules;
    }
}
