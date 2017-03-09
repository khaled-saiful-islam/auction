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

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
