<?php

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Description of CategoriesTable
 */
class CategoriesTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('Categories');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Products', [
            'foreignKey' => 'category_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'products_categories'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('name', 'valid', ['rule' => 'alphaNumeric'])
                ->add('name', 'valid', ['rule' => ['minLength', 4], 'message' => 'Minimum length 4'])
                ->notEmpty('name');

        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['name']));
        return $rules;
    }

}
