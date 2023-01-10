<?php

namespace app\models;


use system\core\Model;

class User extends Model
{


    public function addUser($data){


            $this->db->insert('users', $data);

    }

}