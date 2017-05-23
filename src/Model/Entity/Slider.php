<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Description of Slider
 *
 * @author Khaled Saiful Islam
 */
class Slider extends Entity {

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

}
