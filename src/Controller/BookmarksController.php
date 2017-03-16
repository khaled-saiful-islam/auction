<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;

/**
 * Description of BookmarksController
 *
 * @author Khaled Saiful Islam
 */
class BookmarksController extends AppController {

    public function add($id = null) {
        $message = '';
        $this->autoRender = false;
        $loginUser = $this->Auth->user();

        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('ajax')) {
            $data['product_id'] = $id;
            $data['user_id'] = $loginUser['id'];

            $bookmark = $this->Bookmarks->patchEntity($bookmark, $data);

            if ($this->Bookmarks->save($bookmark)) {
                $message = 'Product is set as a bookmark';
            } else {
                $message = 'Product is not set as a bookmark';
            }
        }
        echo $message;
    }

    public function index() {
        $leftNavActive['bookmark'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('bookmarks', $this->paginate($this->Bookmarks, ['conditions' => ['user_id' => $loginUser['id']], 'limit' => 5, 'order' => array('id' => 'asc')]));
        $this->set(compact('bookmarks', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['bookmarks', 'loginUser', 'leftNavActive']);
    }

    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $bookmark = $this->Bookmarks->get($id);

        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success('Bookmark has been deleted.', [
                'params' => [
                    'class' => 'alert alert-block alert-success alert-custom-msg-block'
                ]
            ]);
        } else {
            $this->Flash->error('Bookmark could not be deleted. Please, try again.', [
                'params' => [
                    'class' => 'alert alert-block alert-danger'
                ]
            ]);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'delete'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
