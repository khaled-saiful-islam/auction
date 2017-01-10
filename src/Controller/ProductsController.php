<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * Description of ProductsController
 *
 * @author Khaled Saiful Islam
 */
class ProductsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['view']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function view() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');

        $loginUser = $this->Auth->user();
        $this->set(compact('loginUser', 'home'));
        $this->set('_serialize', ['loginUser', 'home']);
    }

}
