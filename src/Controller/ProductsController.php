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
        $this->Auth->allow(['viewFromHome']);
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

            $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'products';
            if (!empty($this->request->data['image1_path']['name'])) {
                if ($this->isSupportedExt($this->request->data['image1_path']['name'])) {
                    $file_name = time() . '_' . $this->request->data['image1_path']['name'];
                    if ($this->uploadFile($uploadFolder, $file_name, $this->request->data['image1_path']['tmp_name'])) {
                        $this->request->data['image1_path'] = $file_name;
                    } else {
                        $this->Flash->error('Image has not been saved', [
                            'params' => [
                                'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                            ]
                        ]);
                    }
                } else {
                    $this->Flash->error('Image extension was not supported', [
                        'params' => [
                            'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                        ]
                    ]);
                }
            }

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

    public function edit($id = null, $from = '') {
        $leftNavActive['product'] = true;
        $leftNavActive['productIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $product = $this->Products->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if (!empty($this->request->data['image1_path']['name'])) {
                $ext = substr(strtolower(strrchr($this->request->data['image1_path']['name'], '.')), 1);
                $supported_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $supported_ext)) {
                    $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'products';
                    $file_name = time() . '_' . $this->request->data['image1_path']['name'];
                    $uploadPath = $uploadFolder . DS . $file_name;
                    if (!file_exists($uploadFolder)) {
                        mkdir($uploadFolder, 0775, true);
                    }

                    if (!empty($product['image1_path']) && file_exists($uploadFolder . DS . $product['image1_path'])) {
                        unlink($uploadFolder . DS . $product['image1_path']);
                    }

                    if (move_uploaded_file($this->request->data['image1_path']['tmp_name'], $uploadPath)) {
                        $this->request->data['image1_path'] = $file_name;
                    } else {
                        $this->Flash->error('Image has not been saved', [
                            'params' => [
                                'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                            ]
                        ]);
                    }
                } else {
                    $this->Flash->error('Image extension was not supported', [
                        'params' => [
                            'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                        ]
                    ]);
                }
            }

            $product = $this->Products->patchEntity($product, $this->request->data);

            if (isset($this->request->data['image1_path']['name']) && empty($this->request->data['image1_path']['name'])) {
                unset($product['image1_path']);
            }

            if ($this->Products->save($product)) {
                $this->Flash->success('The product has been Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                if ($from == 'view') {
                    return $this->redirect(['controller' => 'Products', 'action' => 'view', $id]);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
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
    public function view($id = null) {
        $leftNavActive['product'] = true;
        $leftNavActive['productIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $product = $this->Products->get($id);
        $this->set(compact('loginUser', 'product', 'leftNavActive'));
        $this->set('_serialize', ['loginUser', 'product', 'leftNavActive']);
    }

    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $product = $this->Products->get($id);

        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'products';

        if (!empty($product['image1_path']) && file_exists($uploadFolder . DS . $product['image1_path'])) {
            unlink($uploadFolder . DS . $product['image1_path']);
        }

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

    public function viewFromHome() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');

        $loginUser = $this->Auth->user();
        $this->set(compact('loginUser', 'home'));
        $this->set('_serialize', ['loginUser', 'home']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'edit', 'view', 'delete'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
