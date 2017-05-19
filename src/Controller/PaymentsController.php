<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;

/**
 * Description of PaymentsController
 *
 * @author Khaled Saiful Islam
 */
class PaymentsController extends AppController {

    public function registrationFee() {
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->data);

            if ($this->Payments->save($payment)) {

                $this->loadModel('Users');
                $user = $this->Users->get($this->request->data['user_id'], ['contain' => []]);

                $user['payment'] = 1;
                if ($this->Users->save($user)) {
                    $this->Flash->success('Payment is successful', [
                        'params' => [
                            'class' => 'alert alert-block alert-success alert-custom-msg-block'
                        ]
                    ]);
                }
            } else {
                $this->Flash->error('Error!..Payment is not successful', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }

        return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);

        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['registrationFee'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
