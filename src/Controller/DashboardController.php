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

        $this->loadModel('Bookmarks');
        $bookmarks = $this->Bookmarks->find('all', array('conditions' => array('user_id' => $loginUser['id'])));
        
        $bookmark_count = 0;
        foreach($bookmarks as $bookmark){
            $bookmark_count++;
        }

        $this->set(compact('loginUser', 'bookmarks', 'bookmark_count'));
        $this->set('_serialize', ['loginUser', 'bookmarks', 'bookmark_count']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['index'])) {
            return true;
        }
    }

}
