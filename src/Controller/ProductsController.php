<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Cake\I18n\Time;

/**
 * Description of ProductsController
 *
 * @author Khaled Saiful Islam
 */
class ProductsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['viewFromHome', 'specialProduct', 'exclusiveProduct', 'viewFromExclusive', 'viewFromSpecial']);
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

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $tag = array();
        foreach ($categories as $category) {
            $tag[$category->name] = $category->name;
        }

        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

            $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'products';
            for ($i = 1; $i < 5; $i++) {
                if (!empty($this->request->data['image' . $i . '_path']['name'])) {
                    if ($this->isSupportedExt($this->request->data['image' . $i . '_path']['name'])) {
                        $file_name = time() . '_' . $this->request->data['image' . $i . '_path']['name'];
                        if ($this->uploadFile($uploadFolder, $file_name, $this->request->data['image' . $i . '_path']['tmp_name'])) {
                            $this->request->data['image' . $i . '_path'] = $file_name;
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
            }

            $product['created_by'] = $loginUser['id'];
            if (isset($this->request->data['minimum_bid']) && !empty($this->request->data['minimum_bid'])) {
                $product['highest_bid'] = $this->request->data['minimum_bid'];
            }

            $date_validation = true;
            if ((isset($this->request->data['start_date']) & !empty($this->request->data['start_date'])) && (isset($this->request->data['end_date']) && !empty($this->request->data['end_date']))) {
                $c_date = strtotime(date('Y-m-d H:i'));
                $s_date = strtotime($this->request->data['start_date']);
                $e_date = strtotime($this->request->data['end_date']);

                $this->request->data['start_date'] = new Time($this->request->data['start_date']);
                $this->request->data['end_date'] = new Time($this->request->data['end_date']);

                if ($s_date < $c_date || $e_date < $c_date || $e_date < $s_date) {
                    $date_validation = false;
                }
            }

            if ($date_validation) {
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
            } else {
                $this->Flash->error('Start Date and End Date was not right', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }

        $this->set(compact('product', 'loginUser', 'leftNavActive', 'tag'));
        $this->set('_serialize', ['product', 'loginUser', 'leftNavActive', 'tag']);
    }

    public function edit($id = null, $from = '') {
        $leftNavActive['product'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $tag = array();
        foreach ($categories as $category) {
            $tag[$category->name] = $category->name;
        }

        $product = $this->Products->get($id, ['contain' => ['Categories']]);

        $selectedTag = array();
        foreach ($product->categories as $category) {
            $selectedTag[$category->name] = $category->name;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'products';
            for ($i = 1; $i < 5; $i++) {
                if (!empty($this->request->data['image' . $i . '_path']['name'])) {
                    if ($this->isSupportedExt($this->request->data['image' . $i . '_path']['name'])) {
                        $file_name = time() . '_' . $this->request->data['image' . $i . '_path']['name'];
                        if ($this->uploadFile($uploadFolder, $file_name, $this->request->data['image' . $i . '_path']['tmp_name'])) {
                            if (!empty($product['image' . $i . '_path']) && file_exists($uploadFolder . DS . $product['image' . $i . '_path'])) {
                                unlink($uploadFolder . DS . $product['image' . $i . '_path']);
                            }
                            $this->request->data['image' . $i . '_path'] = $file_name;
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
            }

            if (isset($this->request->data['minimum_bid']) && !empty($this->request->data['minimum_bid'])) {
                $product['highest_bid'] = $this->request->data['minimum_bid'];
            }

            $date_validation = true;
            if ((isset($this->request->data['start_date']) & !empty($this->request->data['start_date'])) && (isset($this->request->data['end_date']) && !empty($this->request->data['end_date']))) {
                $c_date = strtotime(date('Y-m-d H:i'));
                $s_date = strtotime($this->request->data['start_date']);
                $e_date = strtotime($this->request->data['end_date']);

                $this->request->data['start_date'] = new Time($this->request->data['start_date']);
                $this->request->data['end_date'] = new Time($this->request->data['end_date']);

                if ($s_date < $c_date || $e_date < $c_date || $e_date < $s_date) {
                    $date_validation = false;
                }
            }

            if ($date_validation) {
                $product = $this->Products->patchEntity($product, $this->request->data);

                for ($i = 1; $i < 5; $i++) {
                    if (isset($this->request->data['image' . $i . '_path']['name']) && empty($this->request->data['image' . $i . '_path']['name'])) {
                        unset($product['image' . $i . '_path']);
                    }
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
            } else {
                $this->Flash->error('Start Date and End Date was not right', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('product', 'leftNavActive', 'loginUser', 'tag', 'selectedTag'));
        $this->set('_serialize', ['product', 'leftNavActive', 'loginUser', 'tag', 'selectedTag']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function view($id = null) {
        $leftNavActive['product'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $product = $this->Products->get($id);

        $this->loadModel('Bids');
        $this->set('bids', $this->paginate($this->Bids, ['conditions' => ['product_id' => $id], 'limit' => 5, 'order' => array('id' => 'asc')]));

        $this->set(compact('loginUser', 'product', 'leftNavActive'));
        $this->set('_serialize', ['loginUser', 'product', 'leftNavActive', 'bids']);
    }

    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $product = $this->Products->get($id);

        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'products';

        for ($i = 1; $i < 5; $i++) {
            if (!empty($product['image' . $i . '_path']) && file_exists($uploadFolder . DS . $product['image' . $i . '_path'])) {
                unlink($uploadFolder . DS . $product['image' . $i . '_path']);
            }
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

    public function viewFromHome($id = null) {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $bookmarked = array();
        if (isset($loginUser['id']) && !empty($loginUser['id'])) {
            $this->loadModel('Users');
            $bookmarks = $this->Users->get($loginUser['id'], ['contain' => ['Bookmarks']]);

            foreach ($bookmarks['bookmarks'] as $bookmark) {
                $bookmarked[] = $bookmark['product_id'];
            }
        }

        $product = $this->Products->get($id, ['contain' => ['Categories']]);

        $this->set(compact('loginUser', 'home', 'product', 'bookmarked'));
        $this->set('_serialize', ['loginUser', 'home', 'product', 'bookmarked']);
    }

    public function viewFromExclusive($id = null) {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $bookmarked = array();
        if (isset($loginUser['id']) && !empty($loginUser['id'])) {
            $this->loadModel('Users');
            $bookmarks = $this->Users->get($loginUser['id'], ['contain' => ['Bookmarks']]);

            foreach ($bookmarks['bookmarks'] as $bookmark) {
                $bookmarked[] = $bookmark['product_id'];
            }
        }

        $product = $this->Products->get($id);

        $this->set(compact('loginUser', 'home', 'product', 'bookmarked'));
        $this->set('_serialize', ['loginUser', 'home', 'product', 'bookmarked']);
    }

    public function viewFromSpecial($id = null) {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $bookmarked = array();
        if (isset($loginUser['id']) && !empty($loginUser['id'])) {
            $this->loadModel('Users');
            $bookmarks = $this->Users->get($loginUser['id'], ['contain' => ['Bookmarks']]);

            foreach ($bookmarks['bookmarks'] as $bookmark) {
                $bookmarked[] = $bookmark['product_id'];
            }
        }

        $product = $this->Products->get($id);

        $this->set(compact('loginUser', 'home', 'product', 'bookmarked'));
        $this->set('_serialize', ['loginUser', 'home', 'product', 'bookmarked']);
    }

    public function stopAuction($id = null) {
        $this->autoRender = false;
        $message = "";

        $product = $this->Products->get($id, ['contain' => []]);
        if ($this->request->is('ajax')) {
            $data['isPause'] = 1;

            $product = $this->Products->patchEntity($product, $data);
            if ($this->Products->save($product)) {
                $message = 'Auction is closed';
            } else {
                $message = 'Auction is not closing';
            }
        }
        echo $message;
    }

    public function startAuction($id = null) {
        $this->autoRender = false;
        $message = "";

        $product = $this->Products->get($id, ['contain' => []]);
        if ($this->request->is('ajax')) {
            $data['isPause'] = 0;

            $product = $this->Products->patchEntity($product, $data);
            if ($this->Products->save($product)) {
                $message = 'Auction is opened again';
            } else {
                $message = 'Auction is not opening';
            }
        }
        echo $message;
    }

    public function specialProduct() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $specialProducts = $this->Products->find('all', array('conditions' => array('type' => 2)));

        $this->set(compact('loginUser', 'home', 'specialProducts'));
        $this->set('_serialize', ['loginUser', 'home', 'specialProducts']);
    }

    public function exclusiveProduct() {
        $home['slider'] = false;
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $exclusiveProducts = $this->Products->find('all', array('conditions' => array('type' => 3)));

        $this->set(compact('loginUser', 'home', 'exclusiveProducts'));
        $this->set('_serialize', ['loginUser', 'home', 'exclusiveProducts']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'edit', 'view', 'delete', 'stopAuction', 'startAuction'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
