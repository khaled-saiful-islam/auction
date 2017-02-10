<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 */
class HomeController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $home['slider'] = true;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $this->loadModel('Products');
        $c_date = date('Y-m-d H:i');
        $products = $this->Products->find('all', array('conditions' => array('start_date >' => $c_date)));
        $bidding_products = $this->Products->find('all', array('conditions' => array('start_date <=' => $c_date, 'end_date >' => $c_date)));

        $this->set(compact('loginUser', 'home', 'products', 'bidding_products'));
        $this->set('_serialize', ['loginUser', 'home', 'products', 'bidding_products']);
    }

}
