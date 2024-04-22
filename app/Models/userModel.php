<?php

namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model
{
    public function getData($email, $password)
    {
        return $this->db->table('user')->where(array('useremail' => $email, 'password' => $password))->get()->getRowArray();
    }

    public function saveData($data)
    {
        $this->db->table('user')->insert($data);
    }
}
