<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Description of ProductsTable
 *
 * @author Khaled Saiful Islam
 */
class ProductsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('products');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('code', 'valid', ['rule' => 'alphaNumeric'])
                ->add('code', 'valid', ['rule' => ['minLength', 3], 'message' => 'Minimum length 3'])
                ->notEmpty('code');

        $validator
                ->add('title', 'valid', ['rule' => 'alphaNumeric'])
                ->add('title', 'valid', ['rule' => ['minLength', 4], 'message' => 'Minimum length 4'])
                ->notEmpty('title');

        $validator
                ->allowEmpty('details');

        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['code']));
        return $rules;
    }

}
