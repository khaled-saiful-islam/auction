<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['logout', 'register']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $leftNavActive['user'] = true;
        $leftNavActive['userIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('users', $this->paginate($this->Users));
        $this->set(compact('users', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['users', 'loginUser']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Apps', 'Bookmarks', 'Profiles']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $leftNavActive['user'] = true;
        $leftNavActive['userAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('user', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['user', 'loginUser', 'leftNavActive']);
    }

    public function register() {
        $message = "";
        $user = $this->Users->newEntity();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $message = 'User was saved successfully';
            } else {
                $message = 'User was not saved successfully';
            }
        }
        echo $message;
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.', [
                'params' => [
                    'class' => 'alert alert-block alert-success alert-custom-msg-block'
                ]
            ]);
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.', [
                'params' => [
                    'class' => 'alert alert-block alert-danger'
                ]
            ]);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Welcome! ' . $user["name"] . ' to Auction', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your email or password is incorrect.', [
                'params' => [
                    'class' => 'alert alert-block alert-danger'
                ]
            ]);
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.', [
            'params' => [
                'class' => 'alert alert-block alert-success alert-custom-msg-block'
            ]
        ]);
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'delete'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
