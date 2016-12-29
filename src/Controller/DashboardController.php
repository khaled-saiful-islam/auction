<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController
{
//    public function beforeFilter(\Cake\Event\Event $event)
//    {
//        //$this->Auth->allow(['index']);
//    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
    }
    
    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        if (in_array($action, ['index'])) {
            return true;
        }
    }
}


