<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;

/**
 * Description of SlidersController
 *
 * @author Khaled Saiful Islam
 */
class SlidersController extends AppController {

    public function index() {
        $leftNavActive['settings'] = true;
        $leftNavActive['sliderAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('sliders', $this->paginate($this->Sliders, ['limit' => 5, 'order' => array('id' => 'asc')]));
        $this->set(compact('sliders', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['sliders', 'loginUser', 'leftNavActive']);
    }

    public function add() {
        $leftNavActive['settings'] = true;
        $leftNavActive['sliderAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image_path']['name'])) {
                $image_info = getimagesize($this->request->data['image_path']['tmp_name']);

                $ext = substr(strtolower(strrchr($this->request->data['image_path']['name'], '.')), 1);
                $supported_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $supported_ext)) {
                    if ($image_info[0] == 1680 && $image_info[1] == 600) {
                        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'sliders';
                        $file_name = time() . '_' . $this->request->data['image_path']['name'];
                        $uploadPath = $uploadFolder . DS . $file_name;

                        if (!file_exists($uploadFolder)) {
                            mkdir($uploadFolder, 0775, true);
                        }
                        if (move_uploaded_file($this->request->data['image_path']['tmp_name'], $uploadPath)) {
                            $this->request->data['image_path'] = $file_name;

                            $slider = $this->Sliders->patchEntity($slider, $this->request->data);
                            if ($this->Sliders->save($slider)) {
                                $this->Flash->success('The slider image has been saved.', [
                                    'params' => [
                                        'class' => 'alert alert-block alert-success alert-custom-msg-block'
                                    ]
                                ]);
                                return $this->redirect(['action' => 'index']);
                            } else {
                                $this->Flash->error('The slider image could not be saved.', [
                                    'params' => [
                                        'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                                    ]
                                ]);
                            }
                        } else {
                            $this->Flash->error('Image has not been saved', [
                                'params' => [
                                    'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                                ]
                            ]);
                        }
                    } else {
                        $this->Flash->error('Image Width and Height was not supported, Please use 1680X600 image', [
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

        $this->set(compact('loginUser', 'leftNavActive', 'slider'));
        $this->set('_serialize', ['loginUser', 'leftNavActive', 'slider']);
    }

    public function delete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $slider = $this->Sliders->get($id);

        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'sliders';

        if (!empty($slider['image_path']) && file_exists($uploadFolder . DS . $slider['image_path'])) {
            unlink($uploadFolder . DS . $slider['image_path']);
        }

        if ($this->Sliders->delete($slider)) {
            $this->Flash->success('The image has been deleted.', [
                'params' => [
                    'class' => 'alert alert-block alert-success alert-custom-msg-block'
                ]
            ]);
        } else {
            $this->Flash->error('The image could not be deleted. Please, try again.', [
                'params' => [
                    'class' => 'alert alert-block alert-danger'
                ]
            ]);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
