<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Description of ContactsController
 *
 * @author Khaled Saiful Islam
 */
class ContactsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['add']);
    }

    public function add() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->data);

            if (!$this->Contacts->save($contact)) {
                $this->Flash->error('Contact information could not be saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect(['action' => 'add']);
            } else {
                $email = new Email('gmail');
                $email->from(['oc.automation.qa.bjit.01@gmail.com' => 'Aution Site']);
                $email->to($this->request->data['email']);
                $email->subject(isset($this->request->data['subject']) && $this->request->data['subject'] ? $this->request->data['subject'] : "Guest from Auction site");

                if ($email->send(isset($this->request->data['message']) && $this->request->data['message'] ? $this->request->data['message'] : "Empty Message Field")) {
                    $this->Flash->success('Message sent to Administrator', [
                        'params' => [
                            'class' => 'alert alert-block alert-success alert-custom-msg-block'
                        ]
                    ]);
                }

                return $this->redirect(['action' => 'add']);
            }
        }

        $this->set(compact('loginUser'));
        $this->set('_serialize', ['loginUser']);
    }

}
