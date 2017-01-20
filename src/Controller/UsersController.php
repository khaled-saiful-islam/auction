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
        $this->Auth->allow(['logout', 'register', 'login']);
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

        $this->set('users', $this->paginate($this->Users, ['limit' => 5, 'order' => array('id' => 'asc')]));
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
        $leftNavActive['user'] = true;
        $leftNavActive['userIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $user = $this->Users->get($id);
        $this->set(compact('user', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['user', 'loginUser', 'leftNavActive']);
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
            if (!empty($this->request->data['image_path']['name'])) {
                $ext = substr(strtolower(strrchr($this->request->data['image_path']['name'], '.')), 1);
                $supported_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $supported_ext)) {
                    $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'users';
                    $file_name = time() . '_' . $this->request->data['image_path']['name'];
                    $uploadPath = $uploadFolder . DS . $file_name;
                    if (!file_exists($uploadFolder)) {
                        mkdir($uploadFolder, 0775, true);
                    }
                    if (move_uploaded_file($this->request->data['image_path']['tmp_name'], $uploadPath)) {
                        $this->request->data['image_path'] = $file_name;
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
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('user', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['user', 'loginUser', 'leftNavActive']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $from = null) {
        $leftNavActive['user'] = true;
        $leftNavActive['userIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!empty($this->request->data['image_path']['name'])) {
                $ext = substr(strtolower(strrchr($this->request->data['image_path']['name'], '.')), 1);
                $supported_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $supported_ext)) {
                    $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'users';
                    $file_name = time() . '_' . $this->request->data['image_path']['name'];
                    $uploadPath = $uploadFolder . DS . $file_name;
                    if (!file_exists($uploadFolder)) {
                        mkdir($uploadFolder, 0775, true);
                    }

                    if (!empty($user['image_path']) && file_exists($uploadFolder . DS . $user['image_path'])) {
                        unlink($uploadFolder . DS . $user['image_path']);
                    }

                    if (move_uploaded_file($this->request->data['image_path']['tmp_name'], $uploadPath)) {
                        $this->request->data['image_path'] = $file_name;
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

            $user = $this->Users->patchEntity($user, $this->request->data);
            if (isset($this->request->data['password']) && empty($this->request->data['password'])) {
                unset($user['password']);
            }
            if (isset($this->request->data['image_path']['name']) && empty($this->request->data['image_path']['name'])) {
                unset($user['image_path']);
            }
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                    ]
                ]);
                if ($from == 'view') {
                    return $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The user could not be Edited.', [
                    'params' => [
                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                    ]
                ]);
            }
        }
        $this->set(compact('user', 'leftNavActive', 'loginUser'));
        $this->set('_serialize', ['user', 'leftNavActive', 'loginUser']);
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

        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'users';

        if (!empty($user['image_path']) && file_exists($uploadFolder . DS . $user['image_path'])) {
            unlink($uploadFolder . DS . $user['image_path']);
        }

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

    public function register() {
        $message = "";
        $user = $this->Users->newEntity();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $message = 'User was saved successfully';
            } else {
                $message = 'User was not saved';
            }
        }
        echo $message;
    }

    public function makeAdmin($id = null) {
        $this->autoRender = false;
        $message = "";

        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is('ajax')) {
            $data['level'] = 11;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $message = 'User was Promoted Admin successfully';
            } else {
                $message = 'User was not Promoted Admin';
            }
        }
        echo $message;
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'delete', 'edit', 'view', 'makeAdmin'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
