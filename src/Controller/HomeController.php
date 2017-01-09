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
        $this->viewBuilder()->layout('home');

        $loginUser = $this->Auth->user();
        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['indexq'])) {
            return true;
        }
    }

}
