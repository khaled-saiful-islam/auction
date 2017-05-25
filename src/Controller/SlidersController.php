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
        $leftNavActive['sliderIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('sliders', $this->paginate($this->Sliders, ['conditions' => array('type' => 1), 'limit' => 5, 'order' => array('id' => 'asc')]));
        $this->set(compact('sliders', 'loginUser', 'leftNavActive'));
        $this->set('_serialize', ['sliders', 'loginUser', 'leftNavActive']);
    }

    public function nivoIndex() {
        $leftNavActive['settings'] = true;
        $leftNavActive['nivoSliderIndex'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $this->set('sliders', $this->paginate($this->Sliders, ['conditions' => array('type' => 2), 'limit' => 5, 'order' => array('id' => 'asc')]));
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

    public function addNivoSlider() {
        $leftNavActive['settings'] = true;
        $leftNavActive['nivoSliderAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image_path']['name'])) {
                $image_info = getimagesize($this->request->data['image_path']['tmp_name']);

                $ext = substr(strtolower(strrchr($this->request->data['image_path']['name'], '.')), 1);
                $supported_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $supported_ext)) {
                    if ($image_info[0] == 230 && $image_info[1] == 450) {
                        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'nivoSliders';
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
                                return $this->redirect(['action' => 'nivoIndex']);
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
                        $this->Flash->error('Image Width and Height was not supported, Please use 230X450 image', [
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

    public function edit($id = null) {
        $leftNavActive['settings'] = true;
        $leftNavActive['sliderAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $slider = $this->Sliders->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = true;
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

                        if (!empty($slider['image_path']) && file_exists($uploadFolder . DS . $slider['image_path'])) {
                            unlink($uploadFolder . DS . $slider['image_path']);
                        }

                        if (move_uploaded_file($this->request->data['image_path']['tmp_name'], $uploadPath)) {
                            $this->request->data['image_path'] = $file_name;
                        } else {
                            $status = false;
                            $this->Flash->error('Image has not been saved', [
                                'params' => [
                                    'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                                ]
                            ]);
                        }
                    } else {
                        $status = false;
                        $this->Flash->error('Image Width and Height was not supported, Please use 1680X600 image', [
                            'params' => [
                                'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                            ]
                        ]);
                    }
                } else {
                    $status = false;
                    $this->Flash->error('Image extension was not supported', [
                        'params' => [
                            'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                        ]
                    ]);
                }
            }

            if ($status) {
                $slider = $this->Sliders->patchEntity($slider, $this->request->data);
                if (isset($this->request->data['image_path']['name']) && empty($this->request->data['image_path']['name'])) {
                    unset($slider['image_path']);
                }

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
            }
        }

        $this->set(compact('slider', 'leftNavActive', 'loginUser'));
        $this->set('_serialize', ['slider', 'leftNavActive', 'loginUser']);
    }

    public function nivoEdit($id = null) {
        $leftNavActive['settings'] = true;
        $leftNavActive['sliderAdd'] = true;
        $this->viewBuilder()->layout('dashboard');
        $loginUser = $this->Auth->user();

        $slider = $this->Sliders->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = true;
            if (!empty($this->request->data['image_path']['name'])) {
                $image_info = getimagesize($this->request->data['image_path']['tmp_name']);

                $ext = substr(strtolower(strrchr($this->request->data['image_path']['name'], '.')), 1);
                $supported_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $supported_ext)) {
                    if ($image_info[0] == 1680 && $image_info[1] == 600) {
                        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'nivoSliders';
                        $file_name = time() . '_' . $this->request->data['image_path']['name'];
                        $uploadPath = $uploadFolder . DS . $file_name;

                        if (!file_exists($uploadFolder)) {
                            mkdir($uploadFolder, 0775, true);
                        }

                        if (!empty($slider['image_path']) && file_exists($uploadFolder . DS . $slider['image_path'])) {
                            unlink($uploadFolder . DS . $slider['image_path']);
                        }

                        if (move_uploaded_file($this->request->data['image_path']['tmp_name'], $uploadPath)) {
                            $this->request->data['image_path'] = $file_name;
                        } else {
                            $status = false;
                            $this->Flash->error('Image has not been saved', [
                                'params' => [
                                    'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                                ]
                            ]);
                        }
                    } else {
                        $status = false;
                        $this->Flash->error('Image Width and Height was not supported, Please use 230X450 image', [
                            'params' => [
                                'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                            ]
                        ]);
                    }
                } else {
                    $status = false;
                    $this->Flash->error('Image extension was not supported', [
                        'params' => [
                            'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                        ]
                    ]);
                }
            }

            if ($status) {
                $slider = $this->Sliders->patchEntity($slider, $this->request->data);
                if (isset($this->request->data['image_path']['name']) && empty($this->request->data['image_path']['name'])) {
                    unset($slider['image_path']);
                }

                if ($this->Sliders->save($slider)) {
                    $this->Flash->success('The slider image has been saved.', [
                        'params' => [
                            'class' => 'alert alert-block alert-success alert-custom-msg-block'
                        ]
                    ]);
                    return $this->redirect(['action' => 'nivoIndex']);
                } else {
                    $this->Flash->error('The slider image could not be saved.', [
                        'params' => [
                            'class' => 'alert alert-block alert-danger alert-custom-msg-block'
                        ]
                    ]);
                }
            }
        }

        $this->set(compact('slider', 'leftNavActive', 'loginUser'));
        $this->set('_serialize', ['slider', 'leftNavActive', 'loginUser']);
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

    public function nivoDelete($id = null) {
        $this->viewBuilder()->layout('dashboard');
        $slider = $this->Sliders->get($id);

        $uploadFolder = WWW_ROOT . 'img' . DS . 'uploaded_images' . DS . 'nivoSliders';

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
        return $this->redirect(['action' => 'nivoIndex']);
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['add', 'index', 'delete', 'edit', 'addNivoSlider', 'nivoIndex', 'nivoDelete', 'nivoEdit'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
