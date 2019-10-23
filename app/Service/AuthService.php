<?php namespace Service;

class AuthService extends \Core\Service {

    public function getHash($email){
        $data = $this->db->select("SELECT * FROM Users WHERE Email = :Email", array(':Email' => $email));
        return $data[0]->Password;
    }

    public function getID($email){
        $data = $this->db->select("SELECT Id FROM Users WHERE Email = :Email", array(':Email' => $email));
        return $data[0]->Id;
    }

    public function updateUserPassword($data, $email){
        $where = array('Email' => $email);
        $this->db->update(PREFIX . 'Users', $data, $where);
    }

}
