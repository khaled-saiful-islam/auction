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
        $this->set(compact('loginUser', 'home'));
        $this->set('_serialize', ['loginUser', 'home']);
    }

}
