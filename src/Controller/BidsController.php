<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;

/**
 * Description of BidsController
 *
 * @author Khaled Saiful Islam
 */
class BidsController extends AppController {

    public function add($user_id = null, $product_id = null) {
        $bid = $this->Bids->newEntity();
        if ($this->request->is('post')) {

            $c_date = strtotime(date('Y-m-d H:i'));
            if ($this->request->data['end_date'] >= $c_date) {

                if ($this->request->data['bid_amount'] >= $this->request->data['minimum_increment']) {
                    $this->request->data['user_id'] = $user_id;
                    $this->request->data['product_id'] = $product_id;

                    $bid = $this->Bids->patchEntity($bid, $this->request->data);
                    if ($this->Bids->save($bid)) {

                        $this->loadModel('Products');
                        $product = $this->Products->get($product_id);

                        $data['highest_bid'] = $product['highest_bid'] + $this->request->data['bid_amount'];
                        $data['highest_bidder_id'] = $user_id;

                        $product = $this->Products->patchEntity($product, $data);
                        if ($this->Products->save($product)) {
                            $this->Flash->success('Your Bid successfully submitted', [
                                'params' => [
                                    'class' => 'alert alert-block alert-success alert-custom-msg-block'
                                ]
                            ]);
                        } else {
                            $this->Flash->error('There is a problem while submitting bid', [
                                'params' => [
                                    'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                                ]
                            ]);
                        }
                        return $this->redirect(['controller' => 'Products', 'action' => 'viewFromHome', $product_id]);
                    } else {
                        $this->Flash->error('Your Bid was not submitted', [
                            'params' => [
                                'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                            ]
                        ]);
                    }
                } else {
                    $this->Flash->error('Bid amount should be greater than Minimum bid', [
                        'params' => [
                            'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                        ]
                    ]);
                }
            } else {
                $this->Flash->error('Auction time is ended', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
