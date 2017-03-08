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
        $this->belongsToMany('Categories', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'products_categories'
        ]);
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

        $validator
                ->allowEmpty('image1_path')
                ->requirePresence('image1_path', 'create')
                ->add('image1_path', 'validFormat', [
                    'rule' => ['custom', '([^\s]+(\.(?i)(png|jpg|jpeg|gif))$)']
        ]);

        $validator
                ->allowEmpty('image2_path')
                ->requirePresence('image2_path', 'create')
                ->add('image2_path', 'validFormat', [
                    'rule' => ['custom', '([^\s]+(\.(?i)(png|jpg|jpeg|gif))$)']
        ]);

        $validator
                ->allowEmpty('image3_path')
                ->requirePresence('image3_path', 'create')
                ->add('image3_path', 'validFormat', [
                    'rule' => ['custom', '([^\s]+(\.(?i)(png|jpg|jpeg|gif))$)']
        ]);

        $validator
                ->allowEmpty('image4_path')
                ->requirePresence('image4_path', 'create')
                ->add('image4_path', 'validFormat', [
                    'rule' => ['custom', '([^\s]+(\.(?i)(png|jpg|jpeg|gif))$)']
        ]);

        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['code']));
        return $rules;
    }

    public function beforeSave($event, $entity, $options) {
        if ($entity->category_string) {
            $entity->categories = $this->_buildCategories($entity->category_string);
        }
    }

    protected function _buildCategories($categoryString) {
        $addCategory = [];
        $query = $this->Categories->find()
                ->where(['Categories.name IN' => $categoryString]);

        // Remove existing tags from the list of new tags.
        foreach ($query->extract('name') as $existing) {
            $index = array_search($existing, $categoryString);
            if ($index !== false) {
                unset($categoryString[$index]);
            }
        }

        // Add existing tags.
        foreach ($query as $tag) {
            $addCategory[] = $tag;
        }

        // Add new tags.
        foreach ($categoryString as $tag) {
            $addCategory[] = $this->Categories->newEntity(['name' => $tag]);
        }

        return $addCategory;
    }

}
