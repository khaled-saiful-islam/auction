<?php

namespace App\Controller;

/**
 * Description of CategoriesController
 */
class CategoriesController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['all', 'categoryBasedProducts']);
    }

    public function index() {
        $leftNavActive = array();
        $leftNavActive['category'] = true;
        $leftNavActive['categoryIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('categories', $this->paginate($this->Categories, ['limit' => 5, 'order' => array('id' => 'asc')]));
        $this->set(compact('categories', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['categories', 'loginUser']);
    }

    public function all() {
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $categories = $this->Categories->find('all');
        $this->set(compact('categories', 'loginUser'));
        $this->set('_serialize', ['categories', 'loginUser']);
    }

    public function categoryBasedProducts($category = '', $id = null) {
        $this->viewBuilder()->layout('home');
        $loginUser = $this->Auth->user();

        $cat_products = $this->Categories->get($id, ['contain' => 'Products']);
        $this->set(compact('cat_products', 'loginUser', 'category'));
        $this->set('_serialize', ['cat_products', 'loginUser', 'category']);
    }

    public function add() {
        $leftNavActive = array();
        $leftNavActive['category'] = true;
        $leftNavActive['categoryAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $Category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $Category = $this->Categories->patchEntity($Category, $this->request->data);
            if ($this->Categories->save($Category)) {
                $this->Flash->success('The Category has been saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The Category could not be saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('category', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['category', 'loginUser', 'leftNavActive']);
    }

    public function edit($id = null) {
        $leftNavActive['category'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $category = $this->Categories->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);

            if ($this->Categories->save($category)) {
                $this->Flash->success('The category has been Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The category could not be Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('category', 'leftNavActive', 'loginUser'));
        $this->set('_serialize', ['category', 'leftNavActive', 'loginUser']);
    }

    public function view($id = null) {
        $leftNavActive = array();
        $leftNavActive['category'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $category = $this->Categories->get($id);
        $this->set(compact('category', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['category', 'loginUser', 'leftNavActive']);
    }

    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $category = $this->Categories->get($id);

        if ($this->Categories->delete($category)) {
            $this->Flash->success('The category has been deleted.', [
                'params' => [
                    'class' => 'alert alert-block alert-success alert-custom-msg-block'
                ]
            ]);
        } else {
            $this->Flash->error('The category could not be deleted. Please, try again.', [
                'params' => [
                    'class' => 'alert alert-block alert-danger'
                ]
            ]);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        $loginUser = $this->Auth->user();

        if ($loginUser['level'] == 1) {
            if (in_array($action, ['add', 'index', 'all', 'edit', 'delete', 'view'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}
