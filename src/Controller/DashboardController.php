<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->viewBuilder()->layout('dashboard');

        $loginUser = $this->Auth->user();
        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['index'])) {
            return true;
        }
    }

}
