<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        
        $user = $this->Auth->user();
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    
    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        if (in_array($action, ['index'])) {
            return true;
        }
    }
}


