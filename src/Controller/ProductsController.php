<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * Description of ProductsController
 *
 * @author Khaled Saiful Islam
 */
class ProductsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['view']);
    }

    public function index() {
        $leftNavActive['product'] = true;
        $leftNavActive['productIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('products', $this->paginate($this->Products, ['limit' => 5, 'order' => array('id' => 'asc')]));
        $this->set(compact('products', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['products', 'loginUser']);
    }

    public function add() {
        $leftNavActive['product'] = true;
        $leftNavActive['productAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success('The product has been saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The product could not be saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('product', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['product', 'loginUser', 'leftNavActive']);
    }

    public function edit($id = null) {
        $leftNavActive['product'] = true;
        $leftNavActive['productIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $product = $this->Products->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);

            if ($this->Products->save($product)) {
                $this->Flash->success('The product has been Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The product could not be Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('product', 'leftNavActive', 'loginUser'));
        $this->set('_serialize', ['product', 'leftNavActive', 'loginUser']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function view() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');

        $loginUser = $this->Auth->user();
        $this->set(compact('loginUser', 'home'));
        $this->set('_serialize', ['loginUser', 'home']);
    }

    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $product = $this->Products->get($id);

        if ($this->Products->delete($product)) {
            $this->Flash->success('The product has been deleted.', [
                'params' => [
                    'class' => 'alert alert-block alert-success alert-custom-msg-block'
                ]
            ]);
        } else {
            $this->Flash->error('The product could not be deleted. Please, try again.', [
                'params' => [
                    'class' => 'alert alert-block alert-danger'
                ]
            ]);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'edit', 'delete'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
