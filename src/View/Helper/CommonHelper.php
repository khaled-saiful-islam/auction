<?php

namespace App\View\Helper;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonHelper
 *
 * @author Khaled.Saiful.Islam
 */
use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class CommonHelper extends Helper {

    function findProduct($id = null) {
        $products = TableRegistry::get('Products');
        return $products->find('all', array('conditions' => array('id' => $id)))->first();
    }

    function findUser($id = null) {
        $users = TableRegistry::get('Users');
        return $users->find('all', array('conditions' => array('id' => $id)))->first();
    }

    function findSlider($type = null) {
        $sliders = TableRegistry::get('Sliders');
        return $sliders->find('all', array('conditions' => array('type' => $type)));
    }

    function totalBids($product_id = null) {
        $bids = TableRegistry::get('Bids');
        return $bids->find('all', array('conditions' => array('product_id' => $product_id)))->count();
    }

    function findSimilarCategoryProduct($category_id = null) {
        $categories = TableRegistry::get('Categories');
        return $categories->get($category_id, ['contain' => ['Products']]);
    }

}
