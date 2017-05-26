<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 */
class HomeController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['index', 'currentBid', 'upComingBid', 'newCollection', 'termsConditions', 'aboutUs']);
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
        $products = $this->Products->find('all', array('conditions' => array('start_date >' => $c_date, 'type' => 1), 'limit' => 8));
        $bidding_products = $this->Products->find('all', array('conditions' => array('start_date <=' => $c_date, 'end_date >' => $c_date, 'type' => 1), 'limit' => 8));

        $this->set(compact('loginUser', 'home', 'products', 'bidding_products'));
        $this->set('_serialize', ['loginUser', 'home', 'products', 'bidding_products']);
    }

    public function currentBid() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $this->loadModel('Products');
        $c_date = date('Y-m-d H:i');
        $current_bids = $this->Products->find('all', array('conditions' => array('start_date <=' => $c_date, 'end_date >' => $c_date, 'type' => 1)));

        $this->set(compact('loginUser', 'home', 'current_bids'));
        $this->set('_serialize', ['loginUser', 'home', 'current_bids']);
    }

    public function upComingBid() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $this->loadModel('Products');
        $c_date = date('Y-m-d H:i');
        $upcoming_bids = $this->Products->find('all', array('conditions' => array('start_date >' => $c_date, 'type' => 1)));

        $this->set(compact('loginUser', 'home', 'upcoming_bids'));
        $this->set('_serialize', ['loginUser', 'home', 'upcoming_bids']);
    }

    public function newCollection() {
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

    public function aboutUs() {
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

    public function termsConditions() {
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

}
