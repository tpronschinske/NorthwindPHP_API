<?php
/*
 * Users Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */
namespace Service;

class UserService extends \Core\Service {

    public function Users(){
        return $this->db->select("SELECT * FROM " . PREFIX . "Users");
    }

    public function getAllUsers(){
        return $this->db->select("SELECT * FROM " . PREFIX . "Users");
    }

    public function getUserById($id) {
        return $this->db->select("SELECT * FROM " . PREFIX . "Users WHERE Id=:Id", array(':Id' => $id));
    }

    public function getUsersByDefaultPropertyId($id) {
        return $this->db->select("SELECT * FROM " . PREFIX . "Users WHERE DefaultProperty=:DefaultProperty", array(':DefaultProperty' => $id));
    }

    public function getUserByEmail($email){
        $data = $this->db->select("SELECT * FROM " . PREFIX . "Users WHERE Email=:Email", array(':Email' => $email));
        return $data[0];
    }

    public function createUser($userData){
        $this->db->insert(PREFIX . 'Users', $userData);
        return $this->db->select("SELECT * FROM " . PREFIX . "Users ORDER BY UserIndex DESC LIMIT 1");
    }

    public function deleteUserById($id){
        $where = array('Id' => $id);
        return $this->db->delete(PREFIX . 'Users', $where);
    }

    public function updateUser($data, $id){
        $where = array('Id' => $id);
        return $this->db->update(PREFIX . "Users", $data, $where);
    }

    public function getUserPropertiesById($id){
        return $this->db->select("SELECT * FROM " . PREFIX . "UserProperties INNER JOIN Properties ON UserProperties.PropertyId = Properties.Id WHERE UserId=:UserId", array(':UserId' => $id));
    }

}


?>
