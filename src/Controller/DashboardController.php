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
        foreach ($bookmarks as $bookmark) {
            $bookmark_count++;
        }

        $this->loadModel('Products');
        $bidding_products = $this->Products->find('all', array('conditions' => array('highest_bidder_id IS NOT NULL', 'AND' => array('DATE(end_date) >' => date('Y-m-d'))), 'limit' => 3));

        $winning_products = $this->Products->find('all', array('conditions' => array('winner_id' => $loginUser['id'], 'AND' => array('DATE(end_date) <' => date('Y-m-d')))))->count();
        
        $this->loadModel('Bids');
        $bids = $this->Bids->find('all', array('conditions' => array('user_id' => $loginUser['id']), 'group' => array('product_id')))->count();

        $this->set(compact('loginUser', 'bookmarks', 'bookmark_count', 'bidding_products', 'bids', 'winning_products'));
        $this->set('_serialize', ['loginUser', 'bookmarks', 'bookmark_count', 'bidding_products', 'bids', 'winning_products']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['index'])) {
            return true;
        }
    }

}
