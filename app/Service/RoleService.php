<?php
/*
 * Users Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */
namespace Service;

class RoleService extends \Core\Service {

    public function getAllRoles(){
        return $this->db->select("SELECT * FROM " . PREFIX . "Roles");
    }

    public function getRoleDropdownList(){
        return $this->db->select("SELECT Id, RoleName FROM " . PREFIX . "Roles");
    }

    public function getRoleById($id){
        return $this->db->select("SELECT * FROM " . PREFIX . "Roles WHERE Id=:Id", array(':Id' => $id));
    }

    public function createRole($roleData){
        $this->db->insert(PREFIX . 'Roles', $roleData);
    }

    public function updateRole($data, $id){
        $where = array('Id' => $id);
        $this->db->update(PREFIX . "Roles", $data, $where);
        return $this->db->select("SELECT * FROM " . PREFIX . "Roles WHERE Id=:Id", array(':Id' => $id));
    }

    public function removeRole($id){
        $where = array('Id' => $id);
        return $this->db->delete(PREFIX . 'Roles', $where);
    }

    public function getRolePermissionsById($id){
        return $this->db->select("SELECT . 'RoleSettings' . FROM " . PREFIX . "Roles WHERE Id=:Id", array(':Id' => $id));
    }

}
